<?php

namespace Nckg\Firewall\Test;

use Nckg\Firewall\Firewall;
use Nckg\Firewall\Minifier;

class FirewallTest extends TestCase
{
    /** @test */
    public function it_allows_ips()
    {
        $firewall = new Firewall(['128.0.0.1']);
        $this->assertTrue($firewall->isAllowed('128.0.0.1'));
        $this->assertFalse($firewall->isAllowed('128.0.0.2'));

        $firewall = new Firewall(['128.0.0.*']);
        $this->assertTrue($firewall->isAllowed('128.0.0.1'));
        $this->assertTrue($firewall->isAllowed('128.0.0.255'));
        $this->assertFalse($firewall->isAllowed('128.0.1.255'));

        $firewall = new Firewall(['128.0.*.1']);
        $this->assertTrue($firewall->isAllowed('128.0.0.1'));
        $this->assertTrue($firewall->isAllowed('128.0.2.1'));
        $this->assertFalse($firewall->isAllowed('128.0.2.0'));

        $firewall = new Firewall(['128.*.0.1']);
        $this->assertTrue($firewall->isAllowed('128.0.0.1'));

        $firewall = new Firewall(['128.*.*.*']);
        $this->assertTrue($firewall->isAllowed('128.0.0.1'));
        $this->assertTrue($firewall->isAllowed('128.0.0.1'));
    }
}

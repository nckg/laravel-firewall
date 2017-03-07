<?php

namespace Nckg\Firewall;

use Illuminate\Support\Str;

class Firewall
{
    /**
     * @var array
     */
    protected $allowed = [];

    /**
     * Firewall constructor.
     * @param $allowed
     */
    public function __construct($allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * @param $ip
     * @return bool
     */
    public function isAllowed($ip): bool
    {
        foreach ($this->allowed as $pattern) {
            if (Str::is($pattern, $ip)) {
                return true;
            }
        }

        return false;
    }
}

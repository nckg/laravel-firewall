<?php

namespace Getlashified\Firewall;

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
        foreach ($this->getAllowed() as $pattern) {
            if (Str::is($pattern, $ip)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Parses the ips and returns a list of allowed ip addresses
     *
     * @return array
     */
    protected function getAllowed()
    {
        $patterns = [];

        foreach ($this->allowed as $pattern) {

            if ((bool)preg_match('/(\d+)\/(\d+)/u', $pattern, $matches)) {
                for ($i = (int)$matches[1]; $i <= (int)$matches[2]; $i++) {
                    $patterns[] = preg_replace('/\d+\/\d+/u', $i, $pattern);
                }
            } else {
                $patterns[] = $pattern;
            }
        }

        return $patterns;
    }
}

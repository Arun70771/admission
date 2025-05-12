<?php
use Hashids\Hashids;

if (!function_exists('decodeHashids')) {
    function decodeHashids($encodedId)
    {
        $hashids = new Hashids(); // Ensure your Hashids instance is properly configured
        $decoded = $hashids->decode($encodedId);
        return isset($decoded[0]) ? $decoded[0] : null;
    }
}

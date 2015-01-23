<?php

namespace Base64Url;

/**
 * Encode and decode data into Base64 Url Safe
 */
class Base64Url
{
    public static function encode($data, $use_padding = false)
    {
        $encoded = strtr(base64_encode($data), '+/', '-_');

        return true === $use_padding ? $encoded : rtrim($encoded, '=');
    }

    public static function decode($data)
    {
        return base64_decode(strtr($data, '-_', '+/'));
    }
}

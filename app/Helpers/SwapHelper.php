<?php

namespace App\Helpers;

use Illuminate\Support\Arr;

class SwapHelper
{
    public static function xorFunction($string1, $string2)
    {
        $result = '';
        $length = min(strlen($string1), strlen($string2));
        for ($i = 0; $i < $length; $i++) {
            $result .= $string1[$i] ^ $string2[$i];
        }
        return $result;
    }
    public static function xor_string($string, $key)
    {
        $result = '';
        $key_length = strlen($key);

        for ($i = 0; $i < strlen($string); $i++) {
            $result .= $string[$i] ^ $key[$i % $key_length];
        }

        return $result;
    }
    public static function xorSwap($a, $b)
    {

        $a ^= $b;
        $b ^= $a;
        $a ^= $b;
    }
}

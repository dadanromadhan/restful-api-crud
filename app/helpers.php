<?php

if (!function_exists('terbilang')) {
    function terbilang($number)
    {
        return App\Helpers\TerbilangHelper::terbilang($number);
    }
}
if (!function_exists('xorFunction')) {
    function xorFunction($a, $b)
    {
        return App\Helpers\SwapHelper::xorFunction($a, $b);
    }
}
if (!function_exists('xor_string')) {
    function xor_string($string, $key)
    {
        $result = '';
        $keyLength = strlen($key);
        for ($i = 0; $i < strlen($string); $i++) {
            $result .= $string[$i] ^ $key[$i % $keyLength];
        }
        return $result;
    }
}
if (!function_exists('xor_encrypt')) {
    function xor_encrypt($data, $key)
    {
        $result = '';
        for ($i = 0; $i < strlen($data); $i++) {
            $result .= $data[$i] ^ $key[$i % strlen($key)];
        }
        return $result;
    }
}
if (!function_exists('convertToWords')) {
    function convertToWords($num)
    {
        $words = array(
            0 => 'Nol',
            1 => 'Satu',
            2 => 'Dua',
            3 => 'Tiga',
            4 => 'Empat',
            5 => 'Lima',
            6 => 'Enam',
            7 => 'Tujuh',
            8 => 'Delapan',
            9 => 'Sembilan',
            10 => 'Sepuluh',
            11 => 'Sebelas',
            12 => 'Dua Belas',
            13 => 'Tiga Belas',
            14 => 'Empat Belas',
            15 => 'Lima Belas',
            16 => 'Enam Belas',
            17 => 'Tujuh Belas',
            18 => 'Delapan Belas',
            19 => 'Sembilan Belas',
            20 => 'Dua Puluh',
            30 => 'Tiga Puluh',
            40 => 'Empat Puluh',
            50 => 'Lima Puluh',
            60 => 'Enam Puluh',
            70 => 'Tujuh Puluh',
            80 => 'Delapan Puluh',
            90 => 'Sembilan Puluh',
            100 => 'Seratus',
            1000 => 'Seribu',
            1000000 => 'Satu Juta',
            1000000000 => 'Satu Milyar'
        );

        if ($num < 20) {
            return $words[$num];
        }

        if ($num < 100) {
            return $words[10 * floor($num / 10)] . ' ' . $words[$num % 10];
        }

        if ($num < 1000) {
            return $words[floor($num / 100)] . ' Seratus ' . convertToWords($num % 100);
        }

        if ($num < 1000000) {
            return convertToWords(floor($num / 1000)) . ' Ribu ' . convertToWords($num % 1000);
        }

        if ($num < 1000000000) {
            return convertToWords(floor($num / 1000000)) . ' Juta ' . convertToWords($num % 1000000);
        }

        return '';
    }
}

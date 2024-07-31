<?php

if (!function_exists('convertPersianToEnglishNumbers')) {
    function convertPersianToEnglishNumbers($string)
    {
        $persianNumbers = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $englishNumbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

        return str_replace($persianNumbers, $englishNumbers, $string);
    }
}

if (!function_exists('convertArabicToPersianLetters')) {
    function convertArabicToPersianLetters($string)
    {
        $arabicLetters  = ['ي', 'ك', 'ة'];
        $persianLetters = ['ی', 'ک', 'ه'];

        return str_replace($arabicLetters, $persianLetters, $string);
    }
}
<?php
class Number {
    function convertNumberEnToEs($number) {
        $number = number_format($number, 2, ',', '.');
        return $number;
    }
    function convertNumberEsToEn($number) {
        $number = number_format($number, 2, '.', '');
        return $number;
    }
}
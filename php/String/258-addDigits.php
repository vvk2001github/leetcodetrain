<?php

// 258. Add Digits

// Given an integer num, 
// repeatedly add all its digits until the result has only one digit, 
// and return it.

class Solution {

    /**
     * @param int $num
     * @return Integer
     */
    function addDigits($num) {
        while($num > 9) {
            $sum = 0;
            $tmp = $num;
            while($tmp >= 1) {
                $sum += $tmp % 10;
                $tmp = floor($tmp / 10);
            }

            $num = $sum;
        }

        return $num;
    }
}

$num = 10;
// $num = 0;

$solution = new Solution();

print_r($solution->addDigits( $num ), false);
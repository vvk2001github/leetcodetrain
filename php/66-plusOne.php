<?php

// 66. Plus One

// You are given a large integer represented as an integer array digits, 
// where each digits[i] is the ith digit of the integer. 
// The digits are ordered from most significant to least significant in left-to-right order. 
// The large integer does not contain any leading 0's.

// Increment the large integer by one and return the resulting array of digits.

class Solution {

    /**
     * @param int[] $digits
     * @return int[]
     */
    function plusOne($digits) {
        $countDigits = count($digits);
        $carry = 0;
        $digits[$countDigits - 1]++;
        for($i = ($countDigits - 1); $i>=0; $i--) {
            $newCarry = floor(($digits[$i] + $carry)/ 10);
            $digits[$i] = ($digits[$i] + $carry) % 10;
            $carry = $newCarry;
        }

        if($carry > 0) array_unshift($digits, $carry);

        return $digits;
    }
}

// $digits = [1,2,3];
$digits = [9, 9, 9, 9, 9];

$solution = new Solution();

print_r($solution->plusOne( $digits ), false);
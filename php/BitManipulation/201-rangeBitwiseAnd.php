<?php

// 201. Bitwise AND of Numbers Range

// Given two integers left and right that represent the range [left, right], 
// return the bitwise AND of all numbers in this range, inclusive.

class Solution {

    /**
     * @param int $left
     * @param int $right
     * @return Integer
     */
    function rangeBitwiseAnd($left, $right) {
        while($right > $left) {
            $right = $right & $right-1;
        }

        return $left & $right;
    }
}

$left = 5; $right = 7;

$solution = new Solution();

print_r($solution->rangeBitwiseAnd( $left, $right ), false);
<?php

// 326. Power of Three

// Given an integer n, return true if it is a power of three. Otherwise, return false.

// An integer n is a power of three, if there exists an integer x such that n == 3x.

class Solution {

    /**
     * @param int $n
     * @return Boolean
     */
    function isPowerOfThree($n) {
        while($n > 2) {
            $n /= 3;
        }

        if($n == 1) {
            return true;
        } else {
            return false;
        }
    }
}

$n = 81;

$solution = new Solution();

print_r( $solution->isPowerOfThree($n), false);
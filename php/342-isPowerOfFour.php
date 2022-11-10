<?php

// 342. Power of Four

// Given an integer n, return true if it is a power of four. Otherwise, return false.

// An integer n is a power of four, if there exists an integer x such that n == 4x.

class Solution {

    /**
     * @param int $n
     * @return Boolean
     */
    function isPowerOfFour($n) {
        while($n > 3) {
            $n /= 4;
        }

        if($n == 1) {
            return true;
        } else {
            return false;
        }
    }
}

$n = 1;

$solution = new Solution();

print_r( $solution->isPowerOfFour($n), false);
<?php

// 231. Power of Two

// Given an integer n, return true if it is a power of two. Otherwise, return false.

// An integer n is a power of two, if there exists an integer x such that n == 2x.

class Solution {

    /**
     * @param int $n
     * @return Boolean
     */
    function isPowerOfTwo($n) {
        if($n <= 0) return false;
        if($n == 1) return true;
        while($n > 1) {
            if($n % 2 != 0) return false;
            $n = $n / 2;
        }
        
        return true;
    }
}

$n = 17;

$solution = new Solution();

print_r($solution->isPowerOfTwo( $n ), false);
<?php

// 338. Counting Bits

// Given an integer n, r
// eturn an array ans of length n + 1 
// such that for each i (0 <= i <= n), 
// ans[i] is the number of 1's in the binary representation of i.

class Solution {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function countBits($n) {
        $result = [];
        for($i = 0; $i <= $n; $i++) {
            $result[] = substr_count(decbin($i), 1);
        }

        return $result;
    }
}

$n = 5;

$solution = new Solution();

print_r( $solution->countBits($n), false);
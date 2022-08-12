<?php

// 509 

// The Fibonacci numbers, commonly denoted F(n) form a sequence, 
// called the Fibonacci sequence, such that each number is the sum of the two preceding ones, 
// starting from 0 and 1. That is,

// F(0) = 0, F(1) = 1
// F(n) = F(n - 1) + F(n - 2), for n > 1.

// Given n, calculate F(n).

class Solution {

    /**
     * @param int $n
     * @return int
     */
    function fib($n) {
        if($n == 0) return 0;
        if($n == 1) return 1;
        return $this->fib($n - 1) + $this->fib($n-2);
    }
}

$n = 6;

$solution = new Solution();

print_r( $solution->fib($n), false);


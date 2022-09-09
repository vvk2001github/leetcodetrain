<?php

// 69. Sqrt(x)

// Given a non-negative integer x, compute and return the square root of x.

// Since the return type is an integer, the decimal digits are truncated, and only the integer part of the result is returned.

// Note: You are not allowed to use any built-in exponent function or operator, such as pow(x, 0.5) or x ** 0.5.

class Solution {

    /**
     * @param int $x
     * @return int
     */
    function mySqrt($x) {
        if($x == 0) return 0;
        $tmp = $x;
        while($tmp > $x / $tmp) {
            $tmp = ($tmp + $x / $tmp)/ 2;
        }

        return (int)$tmp;
    }
}

$x = 8;

$solution = new Solution();

print_r($solution->mySqrt( $x ), false);

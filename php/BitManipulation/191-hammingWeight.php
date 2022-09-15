<?php

// 191. Number of 1 Bits

// Write a function that takes an unsigned integer and returns the number of '1' bits it has (also known as the Hamming weight).

// Note:

//     Note that in some languages, such as Java, there is no unsigned integer type. 
//     In this case, the input will be given as a signed integer type. 
//     It should not affect your implementation, as the integer's internal binary representation is the same, 
//     whether it is signed or unsigned.
//     In Java, the compiler represents the signed integers using 2's complement notation. Therefore, in Example 3, 
//     the input represents the signed integer. -3.

class Solution {
    /**
     * @param int $n
     * @return Integer
     */
    function hammingWeight($n) {
        $m = decbin($n);
        $len = strlen($m);
        $res = 0;
        for($i = 0; $i < $len; $i++) {
            if($m[$i] == '1') $res++;
        }
        return $res;
    }
}

$n = 11;

$solution = new Solution();

print_r($solution->hammingWeight( $n ), false);
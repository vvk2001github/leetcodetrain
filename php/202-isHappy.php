<?php

// 202

// Write an algorithm to determine if a number n is happy.

// A happy number is a number defined by the following process:

//     Starting with any positive integer, replace the number by the sum of the squares of its digits.
//     Repeat the process until the number equals 1 (where it will stay), or it loops endlessly in a cycle which does not include 1.
//     Those numbers for which this process ends in 1 are happy.

// Return true if n is a happy number, and false if not.

class Solution {

    /**
     * @param int $n
     * @return Boolean
     */
    function isHappy($n) {
        if($n === 1 || $n === 7) return true;

        while($n > 9) {
            $x = $n;
            $sum = 0;
            while($x > 0) {
                $tmp = $x % 10;
                $sum += $tmp * $tmp;
                $x = floor($x / 10);
            }
            if($sum === 1 || $sum === 7) return true;
            $n = $sum;
        }

        return false;
    }
}

$n = 1111111;

$solution = new Solution();

print_r( $solution->isHappy($n), false);
<?php

// 70 

// You are climbing a staircase. 
// It takes n steps to reach the top.

// Each time you can either climb 1 or 2 steps. 
// In how many distinct ways can you climb to the top?

class Solution {

    /**
     * @param int $n
     * @return int`
     */
    function climbStairs($n) {
        $array = [0, 1, 2];
        for($i = 3; $i <= $n; $i++) {
            $array[$i] = $array[$i - 1] + $array[$i - 2];
        }
        return $array[$n];
    }
}

$n = 2;

$solution = new Solution();

print_r( $solution->climbStairs($n), false);
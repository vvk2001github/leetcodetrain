<?php

// 746

// You are given an integer array cost where cost[i] is the cost of ith step on a staircase. 
// Once you pay the cost, you can either climb one or two steps.

// You can either start from the step with index 0, or the step with index 1.

// Return the minimum cost to reach the top of the floor.

class Solution {

    /**
     * @param int[] $cost
     * @return int
     */
    function minCostClimbingStairs($cost) {
        $count = count($cost);
        $sum = [];
        $sum[0] = 0;
        $sum[1] = 0;
        for($i = 2; $i < ($count + 1); $i++) {
            if ($sum[$i - 1] + $cost[$i-1] < $sum[$i-2] + $cost[$i-2]) {
                $sum[$i] = $sum[$i - 1] + $cost[$i-1];
            } else {
                $sum[$i] = $sum[$i-2] + $cost[$i-2];
            }
        }

        return $sum[$count];
    }
}

$cost = [10,15];

$solution = new Solution();

print_r( $solution->minCostClimbingStairs($cost), false);
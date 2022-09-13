<?php

// 977. Squares of a Sorted Array

// Given an integer array nums sorted in non-decreasing order, 
// return an array of the squares of each number sorted in non-decreasing order.

class Solution {

    /**
     * @param int[] $nums
     * @return int[]
     */
    function sortedSquares($nums) {
        $count = count($nums);

        for($i = 0; $i < $count; $i++) {
            $nums[$i] = $nums[$i] * $nums[$i];
        }

        sort($nums);

        return $nums;
    }
}

$nums = [-4,-1,0,3,10];

$solution = new Solution();

print_r( $solution->sortedSquares($nums), false);
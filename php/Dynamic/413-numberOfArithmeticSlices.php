<?php

// 413. Arithmetic Slices

// An integer array is called arithmetic if it consists of at least three elements 
// and if the difference between any two consecutive elements is the same.

//     For example, [1,3,5,7,9], [7,7,7,7], and [3,-1,-5,-9] are arithmetic sequences.

// Given an integer array nums, return the number of arithmetic subarrays of nums.

// A subarray is a contiguous subsequence of the array.

class Solution {

    /**
     * @param int[] $nums
     * @return Integer
     */
    function numberOfArithmeticSlices($nums) {
        $countNums = count($nums);
        $dp = array_fill(0, $countNums, 0);
        $res = 0;

        for($i = 2; $i < $countNums; $i++) {
            if($nums[$i] - $nums[$i - 1] == $nums[$i - 1] - $nums[$i - 2]) {
                $dp[$i] = 1 + $dp[$i - 1];
                $res += $dp[$i];
            }
        }

        return $res;
    }
}

$nums = [1,2,3,4];

$solution = new Solution();

print_r($solution->numberOfArithmeticSlices( $nums ), false);
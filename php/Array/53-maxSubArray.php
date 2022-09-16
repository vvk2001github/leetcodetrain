<?php

// 53. Maximum Subarray

// Given an integer array nums, 
// find the contiguous subarray (containing at least one number) 
// which has the largest sum and return its sum.

// A subarray is a contiguous part of an array.

class Solution {

    /**
     * @param int[] $nums
     * @return int
     */
    function maxSubArray($nums) {
        $countNums = count($nums);
        $max = $nums[0];
        $sum = 0;
        for($i = 0; $i < $countNums; $i++) {
            if($sum < 0) $sum = 0;
            $sum += $nums[$i];
            $max = max($max, $sum);
        }

        return $max;
    }
}
$nums = [-2,1,-3,4,-1,2,1,-5,4];

$solution = new Solution();

print_r($solution->maxSubArray( $nums ), false);
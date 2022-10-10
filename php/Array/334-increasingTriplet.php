<?php

// 334. Increasing Triplet Subsequence

// Given an integer array nums, 
// return true if there exists a triple of indices (i, j, k) 
// such that i < j < k and nums[i] < nums[j] < nums[k]. 
// If no such indices exists, return false.

class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function increasingTriplet($nums) {
        $count = count($nums);

        if($count < 3) return false;

        $a = PHP_INT_MAX;
        $b = PHP_INT_MAX;

        for($i = 0; $i < $count; $i++) {
            if($nums[$i] <= $a) {
                $a = $nums[$i];
            } elseif ($nums[$i] <= $b) {
                $b = $nums[$i];
            } else {
                return true;
            }
        }

        return false;
    }
}

// $nums = [1,2,3,4,5];
// $nums = [2,1,5,0,4,6];
$nums =[20,100,10,12,5,13];

$solution = new Solution();

print_r( $solution->increasingTriplet($nums), false);

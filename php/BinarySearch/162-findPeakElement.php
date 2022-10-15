<?php

// 162. Find Peak Element

// A peak element is an element that is strictly greater than its neighbors.

// Given a 0-indexed integer array nums, 
// find a peak element, and return its index. 
// If the array contains multiple peaks, return the index to any of the peaks.

// You may imagine that nums[-1] = nums[n] = -∞. 
// In other words, an element is always considered to be strictly greater than a neighbor that is outside the array.

// You must write an algorithm that runs in O(log n) time.

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findPeakElement($nums) {
        $count = count($nums);

        if($count == 1) return 0;

        if($count == 2 ) return $nums[0] > $nums[1] ? 0 : 1;

        if($nums[0] > $nums[1]) return 0;

        for($i = 1; $i < ($count - 1); $i++) {
            if($nums[$i] > $nums[$i - 1] && $nums[$i] > $nums[$i + 1]) {
                return $i;
            }
        }

        if($nums[$count - 1] > $nums[$count - 2]) return $count - 1;
    }
}

$nums = [1,2,3,1];

$solution = new Solution();

print_r( $solution->findPeakElement($nums), false);
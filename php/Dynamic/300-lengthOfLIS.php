<?php

// 300. Longest Increasing Subsequence

// Given an integer array nums, 
// return the length of the longest strictly increasing subsequence.

// A subsequence is a sequence that can be derived from an array by deleting some 
// or no elements without changing the order of the remaining elements. 
// For example, [3,6,2,7] is a subsequence of the array [0,3,1,6,2,2,7].

class Solution {

    function __construct() {
        
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        $countNums = count($nums);
        $lis = array_fill(0, $countNums, 1);

        for($i = $countNums - 1; $i >= 0; $i--) {
            for($j = $i + 1; $j < $countNums; $j++) {
                if($nums[$i] < $nums[$j]) {
                    $lis[$i] = max($lis[$i], 1 + $lis[$j]);
                }
            }
        }

        return max($lis);
    }
}

// $nums = [10,9,2,5,3,7,101,18];
$nums = [1,3,5,4,7];
// $nums = [2, 2, 2, 2, 2];

$solution = new Solution();

print_r($solution->lengthOfLIS( $nums ), false);
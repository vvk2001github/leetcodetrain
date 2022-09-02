<?php

// 152. Maximum Product Subarray

// Given an integer array nums, 
// find a contiguous non-empty subarray within the array that has the largest product, 
// and return the product.

// The test cases are generated so that the answer will fit in a 32-bit integer.

// A subarray is a contiguous subsequence of the array.

class Solution {

    /**
     * @param int[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        
        $result = max($nums);

        $curMin = 1;
        $curMax = 1;
        $countNums = count($nums);

        for($i = 0; $i < $countNums; $i++) {
            
            if($nums[$i] == 0) {
                $curMax = 1;
                $curMin = 1;
                continue;
            }

            $tmp = $nums[$i] * $curMax;
            $curMax = max($nums[$i] * $curMax, $nums[$i] * $curMin, $nums[$i]);
            $curMin = min($tmp, $nums[$i] * $curMin, $nums[$i]);

            $result = max($result, $curMax, $curMin);
        }

        return $result;
    }
}

$nums = [2,3,-2,4];

$solution = new Solution();

print_r($solution->maxProduct( $nums ), false);
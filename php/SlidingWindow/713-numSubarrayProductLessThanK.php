<?php

// 713. Subarray Product Less Than K

// Given an array of integers nums and an integer k, 
// return the number of contiguous subarrays 
// where the product of all the elements in the subarray is strictly less than k.

class Solution {

    /**
     * @param int[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numSubarrayProductLessThanK($nums, $k) {
        $count = count($nums);
        
        if($count == 1) {
            if($nums[0] < $k) {
                return 1;
            } else {
                return 0;
            }
        }

        $left = 0;
        $right = 0;
        $product = $nums[0];
        $result = 0;

        while($left < $count || $right < $count) {
            // if($product < $k) $result++;
            while($product < $k && $right < $nums) {
                $result++;
                $right++;
                $product *= $nums[$right];
            }

            while($product >= $k || $left < $right) {
                $product = $product / $nums[$left];
                $left++;
                if($product < $k) $result++;
            }
        }

        return $result;
    }
}

$nums = [10,5,2,6]; $k = 100;

$solution = new Solution();

print_r( $solution->numSubarrayProductLessThanK($nums, $k), false);
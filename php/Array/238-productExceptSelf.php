<?php

// 238. Product of Array Except Self

// Given an integer array nums, 
// return an array answer such that answer[i] is equal to the product of all the elements of nums except nums[i].

// The product of any prefix or suffix of nums is guaranteed to fit in a 32-bit integer.

// You must write an algorithm that runs in O(n) time and without using the division operation.

class Solution {

    /**
     * @param int[] $nums
     * @return int[]
     */
    function productExceptSelf($nums) {
        $countNums = count($nums);

        if($countNums == 2) return [$nums[1], $nums[0]];

        $prefix[0] = 1;
        $prefix[1] = $nums[0];
        $product_prefix = $nums[0];

        $suffix = array_fill(0, $countNums, 0);
        $suffix[$countNums - 1] = 1;
        $suffix[$countNums - 2] = $nums[$countNums - 1];
        $product_suffix = $nums[$countNums - 1];

        for($i = 2; $i < $countNums; $i++) {
            $product_prefix *= $nums[$i - 1];
            $prefix[$i] = $product_prefix;

            $product_suffix *= $nums[$countNums - $i];
            $suffix[$countNums - $i - 1] = $product_suffix;
        }

        // $result = [];
        for($i = 0; $i < $countNums; $i++) {
            $suffix[$i] = $prefix[$i] * $suffix[$i];
        }

        return $suffix;
    }
}

// $nums = [1,2,3,4];
$nums = [-1,1,0,-3,3];

$solution = new Solution();

print_r( $solution->productExceptSelf($nums), false);
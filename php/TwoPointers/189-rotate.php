<?php

// 189. Rotate Array

// !!!!!
// 37 / 38 test cases passed. Time Limit Exceeded
// !!!!!

// Given an array, rotate the array to the right by k steps, where k is non-negative.

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        for($i = 0; $i < $k; $i++) {
            $tmp = array_pop($nums);
            array_unshift($nums, $tmp);
        }
    }
}

$nums = [1,2,3,4,5,6,7]; $k = 3;

$solution = new Solution();

$solution->rotate($nums, $k);

print_r( $nums, false);
<?php

// 189. Rotate Array


// Given an array, rotate the array to the right by k steps, where k is non-negative.

class Solution {

    /**
     * @param Integer[] $nums
     * @param int $k
     * @return NULL
     */
    function rotate(&$nums, $k) {
        
        $count = count($nums);
        $k = $k < $count ? $k : $k % $count;

        if($k == 0) return;
        
        $arr1 = array_slice($nums, 0, -$k);
        $arr2 = array_slice($nums, $count - $k);
        $nums = array_merge($arr2, $arr1);
    }
}

// $nums = [1,2,3,4,5,6,7]; $k = 3;
$nums = [1]; $k = 1;

$solution = new Solution();

$solution->rotate($nums, $k);

print_r( $nums, false);
<?php

// 215. Kth Largest Element in an Array

// Given an integer array nums and an integer k, return the kth largest element in the array.

// Note that it is the kth largest element in the sorted order, not the kth distinct element.

// You must solve it in O(n) time complexity.

class Solution {

    /**
     * @param Integer[] $nums
     * @param int $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {

        sort($nums);
        $count = count($nums);
        return $nums[$count - $k];
    }
}

// $nums = [3,2,1,5,6,4]; $k = 2;
$nums = [3,2,3,1,2,4,5,5,6]; $k = 4;

$solution = new Solution();

print_r( $solution->findKthLargest($nums, $k), false);
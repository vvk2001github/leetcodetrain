<?php

// 34. Find First and Last Position of Element in Sorted Array

// Given an array of integers nums sorted in non-decreasing order, 
// find the starting and ending position of a given target value.

// If target is not found in the array, return [-1, -1].

// You must write an algorithm with O(log n) runtime complexity.

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {

        if($nums == []) return [-1, -1];

        $start = array_search($target, $nums);

        if($start === false) return [-1, -1];

        $end = array_search($target, array_reverse($nums, true));

        return [$start, $end];
    }
}

$nums = [5,7,7,8,8,10]; $target = 8;

$solution = new Solution();

print_r( $solution->searchRange($nums, $target), false);
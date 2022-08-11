<?php
// 704

// Given an array of integers nums which is sorted in ascending order, 
// and an integer target, write a function to search target in nums. 
// If target exists, then return its index. Otherwise, return -1.

// You must write an algorithm with O(log n) runtime complexity.

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $result = array_search($target, $nums);
        if($result === false) return -1;
        return $result;
    }
}

$nums = [-1,0,3,5,9,12];
$target = 9;

$solution = new Solution();

print_r($solution->search( $nums, $target ), false);
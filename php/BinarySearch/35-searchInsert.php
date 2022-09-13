<?php


// 35. Search Insert Position

// Given a sorted array of distinct integers and a target value, 
// return the index if the target is found. 
// If not, return the index where it would be if it were inserted in order.

// You must write an algorithm with O(log n) runtime complexity.

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        $countNums = count($nums);
        $i = 0;
        while($i < $countNums && $nums[$i] < $target) $i++;
        
        if($i >= $countNums) return $countNums;

        return $i;
    }
}

// $nums = [1,3,5,6]; $target = 5;
$nums = [1,3,5,6]; $target = 2;

$solution = new Solution();

print_r($solution->searchInsert( $nums, $target ), false);
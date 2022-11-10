<?php

// 268. Missing Number

// Given an array nums containing n distinct numbers in the range [0, n], 
// return the only number in the range that is missing from the array.

class Solution {

    /**
     * @param int[] $nums
     * @return Integer
     */
    function missingNumber($nums) {
        $countNums = count($nums);
        sort($nums);

        $end = end($nums);

        if($end + 1 == $countNums) {
            return $countNums;
        }

        for($i = 0; $i < $countNums; $i++) {
            if($nums[$i] != $i) {
                return $i;
            }
        }
    }
}

// $nums = [3,0,1];
// $nums = [0,1];
$nums = [9,6,4,2,3,5,7,0,1];

$solution = new Solution();

print_r($solution->missingNumber( $nums ), false);
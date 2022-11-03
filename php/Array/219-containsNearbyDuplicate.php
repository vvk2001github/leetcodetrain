<?php

// 219. Contains Duplicate II

// Given an integer array nums and an integer k, 
// return true if there are two distinct indices i and j in the array 
// such that nums[i] == nums[j] and abs(i - j) <= k.

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function containsNearbyDuplicate($nums, $k) {
        $countNums = count($nums);
        
        for($i = 0; $i < $countNums - 1; $i++) {
            for($j = $i + 1; $j < $countNums; $j++) {
                if($j - $i > $k) break;
                if($nums[$i] == $nums[$j] && abs($i - $j) <= $k)
                return true;
            }
        }

        return false;
    }
}

// $nums = [1,2,3,1]; $k = 3;
// $nums = [1,0,1,1]; $k = 1;
$nums = [1,2,3,1,2,3]; $k = 2;

$solution = new Solution();

print_r($solution->containsNearbyDuplicate( $nums, $k ), false);
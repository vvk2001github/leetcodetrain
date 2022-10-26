<?php

// 55. Jump Game

// You are given an integer array nums. 
// You are initially positioned at the array's first index, 
// and each element in the array represents your maximum jump length at that position.

// Return true if you can reach the last index, or false otherwise.

class Solution {

    /**
     * @param int[] $nums
     * @return Boolean
     */
    function canJump($nums) {
        $countNums = count($nums);
        $jumpLength = $nums[0];
        for($i = 0; $i < $countNums; $i++) {

            if($jumpLength < $nums[$i]) {
                $jumpLength = $nums[$i];
            }

            if($jumpLength == 0 && ($i != $countNums - 1)) {
                return false;
            }

            $jumpLength--;

        }
        return true;
    }
}

$nums = [2,3,1,1,4];

$solution = new Solution();

print_r($solution->canJump( $nums ), false);
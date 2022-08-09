<?php
//Given an array nums. We define a running sum of an array as runningSum[i] = sum(nums[0]…nums[i]).
// Return the running sum of nums.

class Solution {

    /**
     * @param int[] $nums
     * @return int[]
     */
    function runningSum($nums) {
        $result[] = $nums[0];
        for($i = 1; $i < count($nums); $i++) {
            $result[] = $nums[$i] + $result[$i - 1];
        }
        return $result;
    }
}

$solution = new Solution();

$nums = [3,1,2,10,1];

print_r($solution->runningSum( $nums ), false);
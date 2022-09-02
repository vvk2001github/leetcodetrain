<?php

// 416

// Given a non-empty array nums containing only positive integers, 
// find if the array can be partitioned into two subsets such 
// that the sum of elements in both subsets is equal.

class Solution {

    /**
     * @param int[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        $sum = array_sum($nums);

        if($sum % 2 == 1) return false;

        $target = floor($sum / 2);

        $countNums = count($nums);
        $dp = [];

        for($i = 0; $i < $countNums; $i++) {
            
            foreach($dp as $key => $sum) {
                if($nums[$i] + $key == $target) {
                    return true;
                }

                if($nums[$i] + $key < $target) {
                    $dp[$nums[$i] + $key] = 1;
                }
            }

            $dp[$nums[$i]] = 1;
        }

        return isset($dp[$target]);
    }
}

$nums = [1,5,11,5];
// $nums = [100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,99,97];

$solution = new Solution();

print_r($solution->canPartition( $nums ), false);
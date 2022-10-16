<?php

// 209. Minimum Size Subarray Sum

// Given an array of positive integers nums and a positive integer target, 
// return the minimal length of a contiguous subarray [numsl, numsl+1, ..., numsr-1, numsr] 
// of which the sum is greater than or equal to target. If there is no such subarray, 
// return 0 instead.

class Solution {

    /**
     * @param Integer $target
     * @param int[] $nums
     * @return Integer
     */
    function minSubArrayLen($target, $nums) {
        $count = count($nums);
        $l = 0;
        $total = 0;
        $res = PHP_INT_MAX;

        for($r = 0; $r < $count; $r++) {
            $total += $nums[$r];

            while($total >= $target) {
                $res = min($r - $l + 1, $res);
                $total -= $nums[$l];
                $l++;
            }
        }

        if($res == PHP_INT_MAX) {
            return 0;
        } else {
            return $res;
        }
    }
}

$target = 7; $nums = [2,3,1,2,4,3];
$target = 11; $nums = [1,2,3,4,5];

$solution = new Solution();

print_r( $solution->minSubArrayLen($target, $nums), false);
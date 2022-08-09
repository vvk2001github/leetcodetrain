<?php
// Given an array of integers nums, calculate the pivot index of this array.

// The pivot index is the index where the sum of all the numbers strictly to the left of the index is equal to the sum of all the numbers strictly to the index's right.

// If the index is on the left edge of the array, then the left sum is 0 because there are no elements to the left. This also applies to the right edge of the array.

// Return the leftmost pivot index. If no such index exists, return -1.

class Solution {

    /**
     * @param int[] $nums
     * @return int
     */
    function pivotIndex($nums) {
        $nums_len = count($nums);
        $left_sum = 0;
        $right_sum = 0;

        for($j = 1; $j < $nums_len; $j++) {
            $right_sum += $nums[$j];
        }

        if($left_sum == $right_sum) return 0;

        for($i = 1; $i < $nums_len; $i++) {
            $left_sum += $nums[$i - 1];
            $right_sum -= $nums[$i];
            if($left_sum == $right_sum) return $i;
        }
        return -1;
    }
}

$solution = new Solution();

$nums = [2,1,-1];

print_r($solution->pivotIndex( $nums ), false);

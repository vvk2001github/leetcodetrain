<?php

// 283. Move Zeroes

// Given an integer array nums, 
// move all 0's to the end of it while maintaining the relative order of the non-zero elements.

// Note that you must do this in-place without making a copy of the array.

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function moveZeroes(&$nums) {
        $count = count($nums);
        $j = 0;

        for($i = 0; $i < $count; $i++) {
            if($nums[$i] != 0 && $nums[$j] == 0) {
                $nums[$j] = $nums[$i];
                $nums[$i] = 0;
                $j++;
            }
            while($j < $i && $nums[$j] != 0) $j++;

        }
    }
}

// $nums = [0,1,0,3,12];
$nums = [2, 1];

$solution = new Solution();

$solution->moveZeroes($nums);

print_r( $nums, false);
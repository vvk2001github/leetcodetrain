<?php

// 75. Sort Colors

// Cocktail shaker sort

// Given an array nums with n objects colored red, white, or blue, 
// sort them in-place so that objects of the same color are adjacent, 
// with the colors in the order red, white, and blue.

// We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.

// You must solve this problem without using the library's sort function.

class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
        $n = count($nums);
        $left = 0;
        $right = $n - 1;
        do {
            for ($i = $left; $i < $right; $i++) {
                if ($nums[$i] > $nums[$i + 1]) {
                    list($nums[$i], $nums[$i + 1]) = array($nums[$i + 1], $nums[$i]);
                }
            }
            $right--;
            for ($i = $right; $i > $left; $i--) {
                if ($nums[$i] < $nums[$i - 1]) {
                    list($nums[$i], $nums[$i - 1]) = array($nums[$i - 1], $nums[$i]);
                }
            }
            $left++;
        } while ($left <= $right);
    }
}

$nums = [2,0,2,1,1,0];

$solution = new Solution();
$solution->sortColors( $nums );

print_r($nums, false);
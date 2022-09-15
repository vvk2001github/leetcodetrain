<?php

// 136. Single Number

// Given a non-empty array of integers nums, every element appears twice except for one. Find that single one.

// You must implement a solution with a linear runtime complexity and use only constant extra space.

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums) {
        $count = count($nums);
        $tmp = [];
        for($i = 0; $i < $count; $i++) {
            if(isset($tmp[$nums[$i]])) {
                unset($tmp[$nums[$i]]);
            } else {
                $tmp[$nums[$i]] = true;
            }
        }

        return array_key_first($tmp);
    }
}

$nums = [4,1,2,1,2];

$solution = new Solution();

print_r($solution->singleNumber( $nums ), false);
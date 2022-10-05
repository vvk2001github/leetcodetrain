<?php

// 169. Majority Element

// Given an array nums of size n, 
// return the majority element.

// The majority element is the element that appears more than ⌊n / 2⌋ times. 
// You may assume that the majority element always exists in the array.

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $count = count($nums);

        if($count == 1) return $nums[0];

        $target = floor($count / 2);
        
        $res = [];

        for($i = 0; $i < $count; $i++) {
            if(array_key_exists($nums[$i], $res)) {
                $res[$nums[$i]]++;

                if($res[$nums[$i]] > $target) return $nums[$i];
            } else {
                $res[$nums[$i]] = 1;
            }
        }

    }
}

$nums = [2,2,1,1,1,2,2];

$solution = new Solution();

print_r($solution->majorityElement( $nums ), false);
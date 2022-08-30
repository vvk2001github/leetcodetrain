<?php

// 198

// You are a professional robber planning to rob houses along a street. 
// Each house has a certain amount of money stashed, 
// the only constraint stopping you from robbing each of them is that adjacent houses 
// have security systems connected and it will automatically contact the police 
// if two adjacent houses were broken into on the same night.

// Given an integer array nums representing the amount of money of each house, 
// return the maximum amount of money you can rob tonight without alerting the police.

class Solution {

    /**
     * @param int[] $nums
     * @return int
     */
    function rob($nums) {
        $result1 = 0;
        $result2 = 0;
        $count = count($nums);

        for($i = 0; $i < $count; $i++) {
            $t = $nums[$i];
            $temp = max($result1 + $nums[$i], $result2);

            $result1 = $result2;
            $result2 = $temp;
        }
        return $temp;
    }
}

// $nums = [1,2,3,1];
$nums = [2,7,9,3,1];
// $nums = [2,1,1,2];

$solution = new Solution();

print_r($solution->rob( $nums ), false);
<?php

// 45. Jump Game II

// You are given a 0-indexed array of integers nums of length n. 
// You are initially positioned at nums[0].

// Each element nums[i] represents the maximum length of a forward jump from index i. 
// In other words, if you are at nums[i], you can jump to any nums[i + j] where:

//     0 <= j <= nums[i] and
//     i + j < n

// Return the minimum number of jumps to reach nums[n - 1]. 
// The test cases are generated such that you can reach nums[n - 1].

class Solution {

    /**
     * @param int[] $nums
     * @return Integer
     */
    function jump($nums) {
        $countNums = count($nums);

        if($countNums == 1) return 0;

        $res = 0;
        $left = 0; 
        $right = 0;

        while ($right < $countNums - 1) {
            $farthest = 0;
            for($i = $left; $i < ($right + 1); $i++) {
                $farthest = max($farthest, $i + $nums[$i]);
            }

            $left = $right + 1;
            $right = $farthest;
            $res++;
        }

        return $res;
    }
}

$nums = [2,3,1,1,4];

$solution = new Solution();

print_r($solution->jump( $nums ), false);
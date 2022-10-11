<?php

// 560. Subarray Sum Equals K

// Given an array of integers nums and an integer k, 
// return the total number of subarrays whose sum equals to k.

// A subarray is a contiguous non-empty sequence of elements within an array.

class Solution {

    /**
     * @param int[] $nums
     * @param int $k
     * @return int
     */
    function subarraySum($nums, $k) {
        $size = sizeof($nums);
        $occurrence = [1];
        $counter = 0;
        $currentSum = 0;

        for($i = 0; $i < $size; $i++) {
            $currentSum += $nums[$i];
            if(array_key_exists($currentSum - $k, $occurrence)) {
                $counter += $occurrence[$currentSum - $k];
            }

            if(array_key_exists($currentSum, $occurrence)) {
                $occurrence[$currentSum] += 1;
            } else {
                $occurrence[$currentSum] = 1;
            }
        }

        return $counter;
    }
}

// $nums = [1,1,1]; $k = 2;
$nums = [1,2,3]; $k = 3;
// $nums = [0, 0]; $k = 0;

$solution = new Solution();

print_r( $solution->subarraySum($nums, $k), false);
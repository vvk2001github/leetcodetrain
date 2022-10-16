<?php

// !!! BAD BAD BAD

// 713. Subarray Product Less Than K

// Given an array of integers nums and an integer k, 
// return the number of contiguous subarrays 
// where the product of all the elements in the subarray is strictly less than k.

class Solution {

    /**
     * @param int[] $nums
     * @param Integer $k
     * @return Integer
     */
    function numSubarrayProductLessThanK($nums, $k) {

        if($k <= 1) return 0;
        
        $count = count($nums);

        $left = 0; 
        $result = 0;
        $product = 1;



        for ($right = 0; $right < $count; $right++) {
            $product *= $nums[$right];

            while ($product >= $k) {
                $product /= $nums[$left];
                $left++;
                if($left >= $count) break;
            }
            $result += $right - $left + 1;
        }

        return $result;


        // if ($k <= 1) {
        //     return 0;
        // }
        // $l = $count = 0;
        // $prod = 1;
        // foreach ($nums as $r => $num) {
        //     $prod *= $num;
        //     while ($prod >= $k) {
        //         $prod /= $nums[$l++];
        //     }
        //     $count += $r - $l + 1;
        // }

        // return $count;
    }
}

$nums = [10,5,2,6]; $k = 100;
// $nums = [1,2,3]; $k = 0;

$solution = new Solution();

print_r( $solution->numSubarrayProductLessThanK($nums, $k), false);
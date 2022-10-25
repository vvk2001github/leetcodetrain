<?php

// 347. Top K Frequent Elements

// Given an integer array nums and an integer k, 
// return the k most frequent elements. 
// You may return the answer in any order.

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $count_nums = count($nums);
        $freq = [];

        for($i = 0; $i < $count_nums; $i++) {
            if(array_key_exists($nums[$i], $freq)) {
                $freq[$nums[$i]]++;
            } else {
                $freq[$nums[$i]] = 1;
            }
        }

        asort($freq);

        $slice = array_slice($freq, -$k, null, true);

        $result = array_keys($slice);

        return $result;
    }
}

$nums = [1,1,1,2,2,3]; $k = 2;

$solution = new Solution();

print_r( $solution->topKFrequent($nums, $k), false);
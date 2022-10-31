<?php

// 384. Shuffle an Array

// Given an integer array nums, design an algorithm to randomly shuffle the array. 
// All permutations of the array should be equally likely as a result of the shuffling.

// Implement the Solution class:

//     Solution(int[] nums) Initializes the object with the integer array nums.
//     int[] reset() Resets the array to its original configuration and returns it.
//     int[] shuffle() Returns a random shuffling of the array.

class Solution {

    private array $nums;

    /**
     * @param Integer[] $nums
     */
    function __construct($nums) {
        $this->nums = $nums;
    }
  
    /**
     * @return Integer[]
     */
    function reset() {
        return $this->nums;
    }
  
    /**
     * @return Integer[]
     */
    function shuffle() {
        $shf = $this->nums;
        shuffle($shf);
        return $shf;
    }
}

/**
 * Your Solution object will be instantiated and called as such:
 * $obj = Solution($nums);
 * $ret_1 = $obj->reset();
 * $ret_2 = $obj->shuffle();
 */

$solution = new Solution([1, 2, 3]);

print_r($solution->shuffle( ), false);
echo "\n";
print_r($solution->reset( ), false);
echo "\n";
print_r($solution->shuffle( ), false);
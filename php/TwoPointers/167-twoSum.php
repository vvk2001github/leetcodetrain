<?php

// 167. Two Sum II - Input Array Is Sorted

// Given a 1-indexed array of integers numbers 
// that is already sorted in non-decreasing order, 
// find two numbers such that they add up to a specific target number. 
// Let these two numbers be numbers[index1] and numbers[index2] where 1 <= index1 < index2 <= numbers.length.

// Return the indices of the two numbers, 
// index1 and index2, added by one as an integer array [index1, index2] of length 2.

// The tests are generated such that there is exactly one solution. You may not use the same element twice.

// Your solution must use only constant extra space.

class Solution {

    /**
     * @param int[] $numbers
     * @param int $target
     * @return int[]
     */
    function twoSum($numbers, $target) {
        $left = 0;
        $right = count($numbers) - 1;
        while($left < $right) {
            if($numbers[$left] + $numbers[$right] == $target) return [$left + 1, $right + 1];
            if($numbers[$left] + $numbers[$right] > $target) {
                $right--;
            } else {
                $left++;
            }
        }
    }
}

// $numbers = [2,7,11,15]; $target = 9;
// $numbers = [2,3,4]; $target = 6;
$numbers = [-1, 0]; $target = -1;

$solution = new Solution();

print_r( $solution->twoSum($numbers, $target), false);
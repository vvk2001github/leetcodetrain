<?php

// !!!!!
// 42 / 44 test cases passed. Time Limit Exceeded
// !!!!!

// 120. Triangle

// Given a triangle array, 
// return the minimum path sum from top to bottom.

// For each step, you may move to an adjacent number of the row below. 
// More formally, if you are on index i on the current row, 
// you may move to either index i or index i + 1 on the next row.

class Solution {

    /**
     * @param int[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        $height = count($triangle);
        if($height == 1) return $triangle[0][0];

        for($level = $height - 2; $level >=0; $level--) {
            for($position = 0; $position <= $level; $position++) {
                $triangle[$level][$position] += min($triangle[$level + 1][$position], $triangle[$level + 1][$position + 1]);
            }
        }

        return $triangle[0][0];
    }
}
$triangle = [[2],[3,4],[6,5,7],[4,1,8,3]];
// $triangle = [[-10]];

$solution = new Solution();

print_r($solution->minimumTotal( $triangle ), false);
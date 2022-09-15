<?php

// 120. Triangle

// Given a triangle array, 
// return the minimum path sum from top to bottom.

// For each step, you may move to an adjacent number of the row below. 
// More formally, if you are on index i on the current row, 
// you may move to either index i or index i + 1 on the next row.

class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        
    }
}
$triangle = [[2],[3,4],[6,5,7],[4,1,8,3]];

$solution = new Solution();

print_r($solution->minimumTotal( $triangle ), false);
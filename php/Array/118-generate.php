<?php

// 118. Pascal's Triangle

// Given an integer numRows, return the first numRows of Pascal's triangle.

// In Pascal's triangle, each number is the sum of the two numbers directly above it as shown:

class Solution {

    /**
     * @param int $numRows
     * @return Integer[][]
     */
    function generate($numRows) {

        if($numRows == 0) return [];
        if($numRows == 1) return [[1]];
        if($numRows == 2) return [[1], [1, 1]];

        $result = [[1], [1, 1]];
        for($i = 2; $i < $numRows; $i ++){

            for($j = 0; $j < $i + 1; $j ++){
                if($j == 0) {
                    $result[$i][0] = 1;
                    continue;
                }

                if($j == $i) {
                    $result[$i][$i] = 1;
                    continue;
                }

                $result[$i][$j] = $result[$i - 1][$j - 1] + $result[$i - 1][$j];
            }
        }

        return $result;
    }
}
$numRows = 5;

$solution = new Solution();

print_r($solution->generate( $numRows ), false);
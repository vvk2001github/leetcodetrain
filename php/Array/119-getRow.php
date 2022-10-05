<?php

// 119. Pascal's Triangle II

// Given an integer rowIndex, return the rowIndexth (0-indexed) row of the Pascal's triangle.

// In Pascal's triangle, each number is the sum of the two numbers directly above it as shown:

class Solution {

    /**
     * @param int $rowIndex
     * @return int[]
     */
    function getRow($rowIndex) {
        if($rowIndex == 0) return [1];
        if($rowIndex == 1) return [1, 1];
        if($rowIndex == 2) return [1, 2, 1];

        $result = [[1], [1, 1], [1, 2, 1]];
        for($i = 3; $i < $rowIndex + 1; $i ++){

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

        return $result[$rowIndex];
    }
}

$rowIndex = 3;

$solution = new Solution();

print_r($solution->getRow( $rowIndex ), false);
<?php

// 73. Set Matrix Zeroes

// Given an m x n integer matrix matrix, 
// if an element is 0, 
// set its entire row and column to 0's.

// You must do it in place.

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function setZeroes(&$matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);

        $zeros = [];
        for($i = 0; $i < $m; $i++) {
            for($j = 0; $j < $n; $j++) {
                if($matrix[$i][$j] == 0) {
                    $zeros[] = [$i, $j];
                }
            }
        }

        $countZeros = count($zeros);
        for($i = 0; $i < $countZeros; $i++) {
            $y = $zeros[$i][0];
            $x = $zeros[$i][1];

            for($j = 0; $j < $m; $j++) {
                $matrix[$j][$x] = 0;
            }

            for($j = 0; $j < $n; $j++) {
                $matrix[$y][$j] = 0;
            }

        }

    }
}

// $matrix = [[1,1,1],[1,0,1],[1,1,1]];
$matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]];

$solution = new Solution();
$solution->setZeroes( $matrix);
print_r($matrix, false);
<?php

// 566. Reshape the Matrix

// In MATLAB, there is a handy function called reshape 
// which can reshape an m x n matrix into a new one with a different size r x c keeping its original data.

// You are given an m x n matrix mat and two integers r and c 
// representing the number of rows and the number of columns of the wanted reshaped matrix.

// The reshaped matrix should be filled with all the elements 
// of the original matrix in the same row-traversing order as they were.

// If the reshape operation with given parameters is possible and legal, 
// output the new reshaped matrix; Otherwise, output the original matrix.

class Solution {

    /**
     * @param Integer[][] $mat
     * @param int $r
     * @param int $c
     * @return Integer[][]
     */
    function matrixReshape($mat, $r, $c) {
        $m = count($mat);
        $n = count($mat[0]);
        $result = [];
        if( ($m * $n ) != ($r * $c) ) return $mat;
        $curRow = 0;
        $curCol = 0;

        for($i = 0; $i < $m; $i++) {
            for($j = 0; $j < $n; $j++) {
                $result[$curRow][$curCol] = $mat[$i][$j];
                $curCol++;
                if($curCol == $c) {
                    $curCol = 0;
                    $curRow++;
                }
            }
        }

        return $result;
    }
}

$mat = [[1,2],[3,4]]; $r = 1; $c = 4;
// $mat = [[1,2],[3,4]]; $r = 2; $c = 4;

$solution = new Solution();

print_r($solution->matrixReshape( $mat, $r, $c ), false);
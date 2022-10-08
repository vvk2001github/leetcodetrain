<?php

// 240. Search a 2D Matrix II

// Write an efficient algorithm that searches for a value target in an m x n integer matrix matrix. 
// This matrix has the following properties:

//     Integers in each row are sorted in ascending from left to right.
//     Integers in each column are sorted in ascending from top to bottom.

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function searchMatrix($matrix, $target) {
        
        $m = count($matrix);
        $n = count($matrix[0]);

        if($target < $matrix[0][0]) return false;
        if($target > $matrix[$m-1][$n-1]) return false;
        if($target == $matrix[0][0]) return true;
        if($target == $matrix[$m-1][$n-1]) return true;

        for($i = 0; $i < $m; $i++) {
            if($target == $matrix[$i][0]) return true;
            if($target == $matrix[$i][$n - 1]) return true;
            if($target > $matrix[$i][0] && $matrix[$i][$n - 1]) {
                
                $start = 0;
                $end = $n-1;

                while($start < $end) {
                    if($matrix[$i][$start] == $target) return true;
                    if($matrix[$i][$end] == $target) return true;
                    if($start == ($end - 1)) break;

                    // if($target < $matrix[$i][0]) return false;
                    // if($target > $matrix[$i][$n-1]) return false;

                    $center = floor(($end - $start) / 2  + $start);

                    if($target > $matrix[$i][$center]) {
                        $start = $center;
                    } else {
                        $end = $center;
                    }
                }

            }
        }

        return false;
    }
}

// $matrix = [[1,4,7,11,15],[2,5,8,12,19],[3,6,9,16,22],[10,13,14,17,24],[18,21,23,26,30]]; $target = 5;
// $matrix = [[1,4,7,11,15],[2,5,8,12,19],[3,6,9,16,22],[10,13,14,17,24],[18,21,23,26,30]]; $target = 20;
$matrix = [[1],[3],[5]]; $target = 2;

$solution = new Solution();

print_r($solution->searchMatrix( $matrix, $target ), false);
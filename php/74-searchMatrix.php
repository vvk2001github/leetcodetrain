<?php

// 74

// Write an efficient algorithm that searches for a value target in an m x n integer matrix matrix. 
// This matrix has the following properties:

//     Integers in each row are sorted from left to right.
//     The first integer of each row is greater than the last integer of the previous row.


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


        $row = $m-1;
        while($target < $matrix[$row][0]) {
            $row--;
        }

        $start = 0;
        $end = $n-1;

        while($start <= $end) {
            if($matrix[$row][$start] == $target) return true;
            if($matrix[$row][$end] == $target) return true;
            if($start == ($end - 1)) return false;

            if($target < $matrix[$row][0]) return false;
            if($target > $matrix[$row][$n-1]) return false;

            $center = floor(($end - $start) / 2  + $start);

            if($target > $matrix[$row][$center]) {
                $start = $center;
            } else {
                $end = $center;
            }
        }

        return false;
    }
}

// $matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]]; $target = 3;

// $matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]]; $target = 13;
$matrix = [[1], [3]]; $target = 2;

$solution = new Solution();

print_r($solution->searchMatrix( $matrix, $target ), false);
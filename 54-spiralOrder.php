<?php

// 54 

// Given an m x n matrix, return all elements of the matrix in spiral order.

class Solution {

    /**
     * @param int[][] $matrix
     * @return int[]
     */
    function spiralOrder($matrix) {
        $m = count($matrix);
        $n = count($matrix[0]);
        $res = [];
        $start_m = 0;
        $start_n = 0;
        $end_m = $m - 1;
        $end_n = $n - 1;
        while($start_m <= $end_m && $start_n <= $end_n) {

            //left to right
            for($i = $start_n; $i <= $end_n; $i++) {
                $res[] = $matrix[$start_m][$i];
            }
            $start_m++;
            if($start_m > $end_m) break;

            //top to bottom
            for($i = $start_m; $i <= $end_m; $i++) {
                $res[] = $matrix[$i][$end_n];
            };
            $end_n--;
            if($start_n > $end_n) break;

            //right to left
            for($i = $end_n; $i >= $start_n; $i--) {
                $res[] = $matrix[$end_m][$i];
            };
            $end_m--;
            if($start_m > $end_m) break;

            //bottom to top
            for($i = $end_m; $i >= $start_m; $i--){
                $res[] = $matrix[$i][$start_n];
            }
            $start_n++;
            if($start_n > $end_n) break;
        }

        return $res;
    }
}

//$matrix = [[1,2,3],[4,5,6],[7,8,9]];
//$matrix = [[1,2,3,4],[5,6,7,8],[9,10,11,12]];
$matrix = [[2,5,8],[4,0,-1]];

$solution = new Solution();

print_r( $solution->spiralOrder($matrix), false);
<?php

// 59. Spiral Matrix II

// Given a positive integer n, generate an n x n matrix filled with elements from 1 to n2 in spiral order.

class Solution {

    /**
     * @param int $n
     * @return Integer[][]
     */
    function generateMatrix($n) {

        $res = array_fill(0, $n, []);

        for($i = 0; $i < $n; $i++) $res[$i] = array_fill(0, $n, 0);

        $start_m = 0;
        $start_n = 0;
        $end_m = $n - 1;
        $end_n = $n - 1;
        $count = 1;
        while($start_m <= $end_m && $start_n <= $end_n) {

            //left to right
            for($i = $start_n; $i <= $end_n; $i++) {
                $res[$start_m][$i] = $count;
                $count++;
            }

            $start_m++;
            if($start_m > $end_m) break;

            //top to bottom
            for($i = $start_m; $i <= $end_m; $i++) {
                $res[$i][$end_n] = $count;
                $count++;
            };
            $end_n--;
            if($start_n > $end_n) break;

            //right to left
            for($i = $end_n; $i >= $start_n; $i--) {
                $res[$end_m][$i] = $count;
                $count++;
            };
            $end_m--;
            if($start_m > $end_m) break;

            //bottom to top
            for($i = $end_m; $i >= $start_m; $i--){
                $res[$i][$start_n] = $count;
                $count++;
            }
            $start_n++;
            if($start_n > $end_n) break;
        }

        return $res;
    }
}

$n = 3;

$solution = new Solution();

print_r( $solution->generateMatrix($n), false);
<?php

// 62

// There is a robot on an m x n grid. 
// The robot is initially located at the top-left corner (i.e., grid[0][0]). 
// The robot tries to move to the bottom-right corner (i.e., grid[m - 1][n - 1]). 
// The robot can only move either down or right at any point in time.

// Given the two integers m and n, return the number of possible unique paths that the robot can take to reach the bottom-right corner.

// The test cases are generated so that the answer will be less than or equal to 2 * 109.

class Solution {

    /**
     * @param int $m
     * @param int $n
     * @return int
     */
    function uniquePaths($m, $n) {
        $tmp = [];
        for($i = 0; $i < $m; $i++) {
            $tmp[$i] = [];
            $tmp[$i][0] = 1;
        }

        for($i = 1; $i < $n; $i++) {
            $tmp[0][$i] = 1;
        }

        for($i = 1; $i < $m; $i++) {
            for($j = 1; $j < $n; $j++) {
                $tmp[$i][$j] = $tmp[$i-1][$j] + $tmp[$i][$j - 1];
            }
        }

        return $tmp[$m - 1][$n - 1];
    }
}

$m = 3;
$n = 7;

$solution = new Solution();

print_r( $solution->uniquePaths($m, $n), false);
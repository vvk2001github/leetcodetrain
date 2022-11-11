<?php

// 64. Minimum Path Sum

// !!!!! 27 / 61 test cases passed. Status: Time Limit Exceeded

// Given a m x n grid filled with non-negative numbers, 
// find a path from top left to bottom right, 
// which minimizes the sum of all numbers along its path.

// Note: You can only move either down or right at any point in time.

class Solution {

    
    /**
     * @param int[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $m = count($grid);
        $n = count($grid[0]);
        $result[0][0] = $grid[0][0];

        for($i = 1; $i < $m; $i++) {
            $result[$i][0] = $grid[$i][0] + $result[$i - 1][0];
        }

        for($j = 1; $j < $n; $j++) {
            $result[0][$j] = $grid[0][$j] + $result[0][$j - 1];
        }

        for($i = 1; $i < $m; $i++) {
            for($j = 1; $j < $n; $j++) {
                // $min = $result[$i - 1][$j] < $result[$i][$j - 1] ? $result[$i - 1][$j] : $result[$i][$j - 1];
                if($result[$i - 1][$j] < $result[$i][$j - 1]) {
                    $result[$i][$j] = $grid[$i][$j] + $result[$i - 1][$j]; 
                } else {
                    $result[$i][$j] = $grid[$i][$j] + $result[$i][$j - 1];
                }
                // $result[$i][$j] = $grid[$i][$j] + $min;
            }
        }

        return $result[$m - 1][$n - 1];
    }
}

$grid = [[1,3,1],[1,5,1],[4,2,1]];
// $grid = [[1,2,3],[4,5,6]];

$solution = new Solution();

print_r($solution->minPathSum( $grid ), false);
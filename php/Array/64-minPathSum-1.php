<?php

// 64. Minimum Path Sum

// !!!!! 27 / 61 test cases passed. Status: Time Limit Exceeded

// Given a m x n grid filled with non-negative numbers, 
// find a path from top left to bottom right, 
// which minimizes the sum of all numbers along its path.

// Note: You can only move either down or right at any point in time.

class Solution {

    private int $result;
    private array $grid;
    private int $m;
    private int $n;
    private int $stop_m;
    private int $stop_n;

    private function foo(int $y = 0, $x = 0, int $sum = 0): void {
        $sum += $this->grid[$y][$x];

        if ($sum > $this->result) {
            return;
        }

        if($x == $this->stop_n && $y == $this->stop_m) {
            $this->result = min($sum, $this->result);
            return;
        }

        
        if($y + 1 < $this->m) {
            $this->foo(y: $y + 1, x: $x, sum: $sum);
        }

        if($x + 1 < $this->n) {
            $this->foo(y: $y, x: $x + 1, sum: $sum);
        }
    }
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $this->result = PHP_INT_MAX;
        $this->grid = $grid;
        $this->m = count($grid);
        $this->n = count($grid[0]);
        $this->stop_m = $this->m - 1;
        $this->stop_n = $this->n - 1;

        $this->foo();

        return $this->result;
    }
}

// $grid = [[1,3,1],[1,5,1],[4,2,1]];
$grid = [[1,2,3],[4,5,6]];

$solution = new Solution();

print_r($solution->minPathSum( $grid ), false);
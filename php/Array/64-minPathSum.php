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
    private readonly array $directions;

    private function foo(int $y = 0, $x = 0, int $sum = 0, array $visited): void {
        $sum += $this->grid[$y][$x];

        if ($sum > $this->result) {
            return;
        }

        if($x == $this->stop_n && $y == $this->stop_m) {
            $this->result = min($sum, $this->result);
            return;
        }

        $visited[$y][$x] = true;

        

        for($i = 0; $i < 2; $i++) {
            $new_y = $y + $this->directions[$i][0];
            $new_x = $x + $this->directions[$i][1];
            if($new_y < $this->m && $new_x < $this->n && !$visited[$new_y][$new_x]) {
                $this->foo(y: $new_y, x: $new_x, sum: $sum, visited: $visited);
            }
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
        $this->directions = [[1, 0], [0, 1]];

        $tmp_visited = array_fill(0, $this->m, []);
        for($i = 0; $i < $this->m; $i++) {
            $tmp_visited[$i] = array_fill(0, $this->n, false);
        }

        $this->foo(y:0, x: 0, sum: 0, visited: $tmp_visited);

        return $this->result;
    }
}

$grid = [[1,3,1],[1,5,1],[4,2,1]];
// $grid = [[1,2,3],[4,5,6]];

$solution = new Solution();

print_r($solution->minPathSum( $grid ), false);
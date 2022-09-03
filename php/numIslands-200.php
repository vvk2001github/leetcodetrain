<?php

// 200

// Given an m x n 2D binary grid grid which represents a map of '1's (land) and '0's (water), return the number of islands.

// An island is surrounded by water and is formed by connecting adjacent lands horizontally or vertically. 
// You may assume all four edges of the grid are all surrounded by water.

class Solution {

    private $m;
    private $n;

    private function helper(array &$grid, int $row, int $col): void {
        if(($row >= $this->m) || ($row < 0) || ($col >= $this->n) || ($col < 0) || ($grid[$row][$col] != '1')) return;

        $grid[$row][$col] = "c"; // c- checked
        $this->helper($grid, $row + 1, $col);
        $this->helper($grid, $row - 1, $col);
        $this->helper($grid, $row, $col + 1);
        $this->helper($grid, $row, $col - 1);

    }

    /**
     * @param String[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $this->m = count($grid);
        $this->n = count($grid[0]);

        $result = 0;

        for($r = 0; $r < $this->m; $r++) {
            for ($c = 0; $c < $this->n; $c++) {
                if($grid[$r][$c] == '1') {
                    $result++;
                    $this->helper($grid, $r, $c);
                }
            }
        }

        return $result;
    }
}

// $grid = [
//     ["1","1","1","1","0"],
//     ["1","1","0","1","0"],
//     ["1","1","0","0","0"],
//     ["0","0","0","0","0"]
// ];

$grid = [
    ["1","1","0","0","0"],
    ["1","1","0","0","0"],
    ["0","0","1","0","0"],
    ["0","0","0","1","1"]
];

$solution = new Solution();

print_r( $solution->numIslands($grid), false);
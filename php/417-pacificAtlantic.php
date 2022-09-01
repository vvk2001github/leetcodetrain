<?php

// 417

// There is an m x n rectangular island that borders both the Pacific Ocean and Atlantic Ocean. 
// The Pacific Ocean touches the island's left and top edges, and the Atlantic Ocean touches the island's right and bottom edges.

// The island is partitioned into a grid of square cells. 
// You are given an m x n integer matrix heights where heights[r][c] represents the height above sea level of the cell at coordinate (r, c).

// The island receives a lot of rain, 
// and the rain water can flow to neighboring cells directly north, south, east, and west 
// if the neighboring cell's height is less than or equal to the current cell's height. 
// Water can flow from any cell adjacent to an ocean into the ocean.

// Return a 2D list of grid coordinates result where result[i] = [ri, ci] 
// denotes that rain water can flow from cell (ri, ci) to both the Pacific and Atlantic oceans.

class Solution {

    private int $rows;
    private int $cols;
    private array $heights;

    private function dfs(int $r, int $c, array &$visit, int $prevHeighs): void {
        if( in_array([$r, $c], $visit) || ($r < 0) || ($c < 0) || ($r >= $this->rows) || ($c >= $this->cols) || ($this->heights[$r][$c] < $prevHeighs)) {
            return;
        }

        $visit[] = [$r, $c];
        $this->dfs($r + 1, $c, $visit, $this->heights[$r][$c]);
        $this->dfs($r - 1, $c, $visit, $this->heights[$r][$c]);
        $this->dfs($r, $c + 1, $visit, $this->heights[$r][$c]);
        $this->dfs($r, $c - 1, $visit, $this->heights[$r][$c]);
    }

    /**
     * @param Integer[][] $heights
     * @return Integer[][]
     */
    function pacificAtlantic($heights) {
        $this->rows = count($heights);
        $this->cols = count($heights[0]);
        $this->heights = $heights;

        $result = [];
        $pac = [];
        $atl = [];

        for($c = 0; $c < $this->cols; $c++) {
            $this->dfs(0, $c, $pac, $heights[0][$c]);
            $this->dfs($this->rows - 1, $c, $atl, $heights[$this->rows - 1][$c]);
        }

        for($r = 0; $r < $this->rows; $r++) {
            $this->dfs($r, 0, $pac, $this->heights[$r][0]);
            $this->dfs($r, $this->cols - 1, $atl, $this->heights[$r][$this->cols - 1]);
        }

        for($r = 0; $r < $this->rows; $r++) {
            for($c = 0; $c < $this->cols; $c++) {
                if(in_array([$r, $c], $pac) && in_array([$r, $c], $atl)) {
                    $result[] = [$r, $c];
                }
            }
        }

        return $result;
    }
}

$heights = [[1,2,2,3,5],[3,2,3,4,4],[2,4,5,3,1],[6,7,1,4,5],[5,1,1,2,4]];

$solution = new Solution();

print_r($solution->pacificAtlantic( $heights ), false);
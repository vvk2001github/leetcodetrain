<?php

// 695. Max Area of Island

// You are given an m x n binary matrix grid. 
// An island is a group of 1's (representing land) connected 4-directionally (horizontal or vertical.) 
// You may assume all four edges of the grid are surrounded by water.

// The area of an island is the number of cells with a value 1 in the island.

// Return the maximum area of an island in grid. If there is no island, return 0.

class Solution {

    private int $m;
    private int $n;
    private array $visited;
    private array $grid;
    private array $result = [];

    private function foo(int $y, int $x): int {
        $square = 1;
        $this->visited[$y][$x] = true;

        if(($y > 0) && (!$this->visited[$y - 1][$x]) && ($this->grid[$y - 1][$x] == 1)) $square = $square + $this->foo($y - 1, $x);
        if(($y < $this->m - 1) && (!$this->visited[$y + 1][$x]) && ($this->grid[$y + 1][$x] == 1)) $square = $square + $this->foo($y + 1, $x);
        if(($x > 0) && (!$this->visited[$y][$x - 1]) && ($this->grid[$y][$x - 1] == 1)) $square = $square + $this->foo($y, $x - 1);
        if(($x < $this->n - 1) && (!$this->visited[$y][$x + 1]) && ($this->grid[$y][$x + 1] == 1)) $square = $square + $this->foo($y, $x + 1);

        if(!in_array($square, $this->result)) $this->result[] = $square;

        return $square;
    }
    

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function maxAreaOfIsland($grid) {
        $this->m = count($grid);
        $this->n = count($grid[0]);
        $this->grid = $grid;
        $this->visited = array_fill(0, $this->m, []);
        for($y = 0; $y < $this->m; $y++) $this->visited[$y] = array_fill(0, $this->n, false);


        for($y = 0; $y < $this->m; $y++) {
            for($x = 0; $x < $this->n; $x++) {
                if(!$this->visited[$y][$x] && $grid[$y][$x] == 1) $this->foo($y, $x);
            }
        }

        if(count($this->result) == 0) return 0;
        return max($this->result);
    }
}

// $grid = [   [0,0,1,0,0,0,0,1,0,0,0,0,0],
//             [0,0,0,0,0,0,0,1,1,1,0,0,0],
//             [0,1,1,0,1,0,0,0,0,0,0,0,0],
//             [0,1,0,0,1,1,0,0,1,0,1,0,0],
//             [0,1,0,0,1,1,0,0,1,1,1,0,0],
//             [0,0,0,0,0,0,0,0,0,0,1,0,0],
//             [0,0,0,0,0,0,0,1,1,1,0,0,0],
//             [0,0,0,0,0,0,0,1,1,0,0,0,0]];

$grid = [[0,0,0,0,0,0,0,0]];

$solution = new Solution();

print_r( $solution->maxAreaOfIsland($grid), false);
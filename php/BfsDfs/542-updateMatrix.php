<?php

// !!!!!
// 19 / 50 test cases passed.
// !!!!!

// 542. 01 Matrix

// Given an m x n binary matrix mat, return the distance of the nearest 0 for each cell.

// The distance between two adjacent cells is 1.

class Solution {

    private array $visited;
    private int $m;
    private int $n;
    private array $result;
    private array $mat;

    private function foo(int $y, int $x): void {
        $this->visited[$y][$x] = true;

        $top = PHP_INT_MAX;
        if(($y > 0) && ($this->mat[$y - 1][$x] == 0)) $top = 1;
        if(($y > 0) && ($this->mat[$y - 1][$x] == 1) && $this->visited[$y - 1][$x] && $this->result[$y - 1][$x] != 0) {
            $top = $this->result[$y - 1][$x] + 1;
        }
        if(($y > 0) && ($this->mat[$y - 1][$x] == 1) && !$this->visited[$y - 1][$x]) {
            $this->foo($y - 1, $x);
            $top = $this->result[$y - 1][$x] + 1;
        }

        $bottom = PHP_INT_MAX;
        if(($y < $this->m - 1) && ($this->mat[$y + 1][$x] == 0)) $bottom = 1;
        if(($y < $this->m - 1) && ($this->mat[$y + 1][$x] == 1) && $this->visited[$y + 1][$x] && $this->result[$y + 1][$x] != 0) $bottom = $this->result[$y + 1][$x] + 1;
        if(($y < $this->m - 1) && ($this->mat[$y + 1][$x] == 1) && !$this->visited[$y + 1][$x]) {
            $this->foo($y + 1, $x);
            $bottom = $this->result[$y + 1][$x] + 1;
        }

        $left = PHP_INT_MAX;
        if(($x > 0) && ($this->mat[$y][$x - 1] == 0)) $left = 1;
        if(($x > 0) && ($this->mat[$y][$x - 1] == 1) && $this->visited[$y][$x - 1] && $this->result[$y][$x - 1] != 0) $left = $this->result[$y][$x - 1] + 1;
        if(($x > 0) && ($this->mat[$y][$x - 1] == 1) && !$this->visited[$y][$x - 1]) {
            $this->foo($y, $x - 1);
            $left = $this->result[$y][$x - 1] + 1;
        }

        $right = PHP_INT_MAX;
        if(($x < $this->n - 1) && ($this->mat[$y][$x + 1] == 0)) $right = 1;
        if(($x < $this->n - 1) && ($this->mat[$y][$x + 1] == 1) && $this->visited[$y][$x + 1] && $this->result[$y][$x + 1] != 0) $right = $this->result[$y][$x + 1] + 1;
        if(($x < $this->n - 1) && ($this->mat[$y][$x + 1] == 1) && !$this->visited[$y][$x + 1]) {
            $this->foo($y, $x + 1);
            $right = $this->result[$y][$x + 1] + 1;
        }

        $this->result[$y][$x] = min($top, $bottom, $left, $right);

    }

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function updateMatrix($mat) {
        $this->m = count($mat);
        $this->n = count($mat[0]);
        $this->mat = $mat;
        $this->visited = array_fill(0, $this->m, []);
        $this->result = array_fill(0, $this->m, []);
        for($y = 0; $y < $this->m; $y++) {
            $this->visited[$y] = array_fill(0, $this->n, false);
            $this->result[$y] = array_fill(0, $this->n, 0);
        }
        

        for($y = 0; $y < $this->m; $y++) {
            for($x = 0; $x < $this->n; $x++) {
                if(!$this->visited[$y][$x] && $mat[$y][$x] == 0) {
                    $this->visited[$y][$x] = true;
                    continue;
                }
                if(!$this->visited[$y][$x] && $mat[$y][$x] == 1) {
                    // $this->result[$y][$x] = 1;
                    $this->foo($y, $x);
                }
            }
        }

        return $this->result;
    }
}
// $mat = [[0,0,0],[0,1,0],[0,0,0]];
$mat = [[0,0,0],[0,1,0],[1,1,1]];

$solution = new Solution();

print_r( $solution->updateMatrix($mat), false);
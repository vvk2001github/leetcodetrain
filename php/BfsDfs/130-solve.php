<?php

// 130. Surrounded Regions

// Given an m x n matrix board containing 'X' and 'O', 
// capture all regions that are 4-directionally surrounded by 'X'.

// A region is captured by flipping all 'O's into 'X's in that surrounded region.


class Solution {

    private int $m;
    private int $n;

    private function dfs(array &$board, int $y, int $x): void {
        
        if($y < 0 || $y >= $this->m) return;
        if($x < 0 || $x >= $this->n) return;

        if($board[$y][$x] == 'X' || $board[$y][$x] == '+') return;

        $board[$y][$x] = '+';

        $this->dfs($board, $y - 1, $x);
        $this->dfs($board, $y + 1, $x);
        $this->dfs($board, $y, $x - 1);
        $this->dfs($board, $y, $x + 1);
    }

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        $this->m = count($board);
        $this->n = count($board[0]);

        for($i = 0; $i < $this->m; $i++) {
            $this->dfs($board, $i, 0);
            $this->dfs($board, $i, $this->n - 1);
        }

        for($i = 0; $i < $this->n; $i++) {
            $this->dfs($board, 0, $i);
            $this->dfs($board, $this->m - 1, $i);
        }

        for($i = 0; $i < $this->m; $i++) {
            for($j = 0; $j < $this->n; $j++) {
                if($board[$i][$j] == '+') {
                    $board[$i][$j] = 'O';
                } elseif($board[$i][$j] == 'O') {
                    $board[$i][$j] = 'X';
                }
            }
        }

        return $board;
    }
}

// $board = [["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]];
$board = [["X","O","X","O","X","O"],["O","X","O","X","O","X"],["X","O","X","O","X","O"],["O","X","O","X","O","X"]];

$solution = new Solution();

print_r($solution->solve( $board ), false);
<?php

// 79. Word Search

// Given an m x n grid of characters board and a string word, 
// return true if word exists in the grid.

// The word can be constructed from letters of sequentially adjacent cells, 
// where adjacent cells are horizontally or vertically neighboring. 
// The same letter cell may not be used more than once.

class Solution {

    private array $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];
    private int $len;
    private int $m;
    private int $n;
    private string $word;
    private array $board;
    private bool $result;

    private function foo(int $y, int $x, int $index, array $visited): void {

        if($this->result) return;

        if($index == $this->len) {
            $this->result = true;
            return;
        }

        $visited[$y][$x] = 1;

        for($i = 0; $i < 4; $i++) {

            // TMP
            // $wantedLetter = $this->word[$index];

            if($this->result) return;
            $new_y = $y + $this->directions[$i][0];
            $new_x = $x + $this->directions[$i][1];

            if($new_y < 0 || $new_y >= $this->m) continue;
            if($new_x < 0 || $new_x >= $this->n) continue;

            //TMP
            // $curLetter = $this->board[$new_y][$new_x];

            if($visited[$new_y][$new_x]) continue;
            if( $this->board[$new_y][$new_x] == $this->word[$index]) {
                $this->foo($new_y, $new_x, $index + 1, $visited);
            }
        }
    }

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        $this->m = count($board);
        $this->n = count($board[0]);
        $this->len = strlen($word);
        $this->word = $word;
        $this->board = $board;
        $this->result = false;
        $first_letters = [];

        if($this->len > ($this->m * $this->n)) return false;
        

        // Find first letters
        for($i = 0; $i < $this->m; $i++) {
            for($j = 0; $j < $this->n; $j++) {
                if($board[$i][$j] == $word[0]) {
                    $first_letters[] = [$i, $j];
                }
            }
        }

        if($this->len == 1 && count($first_letters) > 0) return true;

        foreach($first_letters as $first_letter) {
            $visited = array_fill(0, $this->m, []);
            for($i = 0; $i < $this->m; $i++) {
                $visited[$i] = array_fill(0, $this->n, 0);
            }

            $this->foo($first_letter[0], $first_letter[1], 1, $visited);
            if($this->result) return true;
        }

        return $this->result;
    }
}

// $board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]]; $word = "ABCCED";
// $board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]]; $word = "ABCB";
$board = [["a","b"],["c","d"]]; $word = "acdb";

$solution = new Solution();

print_r($solution->exist( $board, $word ), false);
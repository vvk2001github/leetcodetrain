<?php

// 79. Word Search

// Given an m x n grid of characters board and a string word, 
// return true if word exists in the grid.

// The word can be constructed from letters of sequentially adjacent cells, 
// where adjacent cells are horizontally or vertically neighboring. 
// The same letter cell may not be used more than once.

class Solution {

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        
    }
}

$board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]]; $word = "ABCCED";

$solution = new Solution();

print_r($solution->exist( $board, $word ), false);
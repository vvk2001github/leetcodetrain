<?php

// 36. Valid Sudoku

// Determine if a 9 x 9 Sudoku board is valid. Only the filled cells need to be validated according to the following rules:

//     Each row must contain the digits 1-9 without repetition.
//     Each column must contain the digits 1-9 without repetition.
//     Each of the nine 3 x 3 sub-boxes of the grid must contain the digits 1-9 without repetition.

// Note:

//     A Sudoku board (partially filled) could be valid but is not necessarily solvable.
//     Only the filled cells need to be validated according to the mentioned rules.

class Solution {

    /**
     * @param String[][] $board
     * @return Boolean
     */
    function isValidSudoku($board) {

        // $cacheGroups = array (0..2, 0..2)
        $cacheGroups = array_fill(0, 3, []);
        $cacheGroups[0] = array_fill(0, 3, []);
        $cacheGroups[1] = array_fill(0, 3, []);
        $cacheGroups[2] = array_fill(0, 3, []);

        for($i = 0; $i < 9; $i++) {
            $cacheRow = [];
            $cacheCol = [];
            for($j = 0; $j < 9; $j++){

                // Check Rows

                if($board[$i][$j] != '.' && array_key_exists($board[$i][$j], $cacheRow)) {
                    return false;
                } else {
                    $cacheRow[$board[$i][$j]] = true;
                }

                // Check Cols

                if($board[$j][$i] != '.' && array_key_exists($board[$j][$i], $cacheCol)) {
                    return false;
                } else {
                    $cacheCol[$board[$j][$i]] = true;
                }

                // Check Groups
                $groupY = floor($i / 3);
                $groupX = floor($j / 3);

                if($board[$i][$j] != '.' && array_key_exists($board[$i][$j], $cacheGroups[$groupX][$groupY])) {
                    return false;
                } else {
                    $cacheGroups[$groupX][$groupY][$board[$i][$j]] = true;
                }
            }
        }

        return true;
    }
}

$board = 
[["5","3",".",".","7",".",".",".","."]
,["6",".",".","1","9","5",".",".","."]
,[".","9","8",".",".",".",".","6","."]
,["8",".",".",".","6",".",".",".","3"]
,["4",".",".","8",".","3",".",".","1"]
,["7",".",".",".","2",".",".",".","6"]
,[".","6",".",".",".",".","2","8","."]
,[".",".",".","4","1","9",".",".","5"]
,[".",".",".",".","8",".",".","7","9"]];

// $board = 
// [["8","3",".",".","7",".",".",".","."]
// ,["6",".",".","1","9","5",".",".","."]
// ,[".","9","8",".",".",".",".","6","."]
// ,["8",".",".",".","6",".",".",".","3"]
// ,["4",".",".","8",".","3",".",".","1"]
// ,["7",".",".",".","2",".",".",".","6"]
// ,[".","6",".",".",".",".","2","8","."]
// ,[".",".",".","4","1","9",".",".","5"]
// ,[".",".",".",".","8",".",".","7","9"]];

$solution = new Solution();

print_r($solution->isValidSudoku( $board ), false);
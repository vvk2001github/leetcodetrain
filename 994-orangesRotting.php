<?php

// 994

// You are given an m x n grid where each cell can have one of three values:

//     0 representing an empty cell,
//     1 representing a fresh orange, or
//     2 representing a rotten orange.

// Every minute, any fresh orange that is 4-directionally adjacent to a rotten orange becomes rotten.

// Return the minimum number of minutes that must elapse until no cell has a fresh orange. If this is impossible, return -1.

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function orangesRotting($grid) {
        $m = count($grid);
        $n = count($grid[0]);

        $stack = [];

        // init
        for($i = 0; $i < $m; $i++) {
            for($j = 0; $j <$n; $j++) {
                if($grid[$i][$j] == 2) $stack[] = [$i, $j];
            }
        }

        $result = 0;

        $curStack = $stack;

        while(true) {
            $len = count($curStack);
            for($i = 0; $i < $len; $i++) {
                $y = $curStack[$i][0];
                $x = $curStack[$i][1];

                if(($y > 0) && ($grid[$y - 1][$x] == 1)) {
                    array_push($stack, [$y - 1, $x]);
                    $grid[$y - 1][$x] = 2;
                }

                if(($y < $m - 1) && ($grid[$y + 1][$x] == 1)) {
                    array_push($stack, [$y + 1, $x]);
                    $grid[$y + 1][$x] = 2;
                }

                if(($x > 0) && ($grid[$y][$x - 1] == 1)) {
                    array_push($stack, [$y, $x - 1]);
                    $grid[$y][$x - 1] = 2;
                }
                if(($x < $n - 1) && ($grid[$y][$x + 1] == 1)) {
                    array_push($stack, [$y, $x + 1]);
                    $grid[$y][$x + 1] = 2;
                }
            }

            if(count($curStack) == count($stack)) break;

            $result++;

            $curStack = $stack;

        }

        for($i = 0; $i < $m; $i++) {
            for($j = 0; $j <$n; $j++) {
                if($grid[$i][$j] == 1) return -1;
            }
        }

        return $result;
    }
}

// $grid = [[2,1,1],[1,1,0],[0,1,1]];
// $grid = [[0,2]];
$grid = [[2,1,1],[0,1,1],[1,0,1]];

$solution = new Solution();

print_r($solution->orangesRotting( $grid ), false);
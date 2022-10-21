<?php

// 1091. Shortest Path in Binary Matrix

// Given an n x n binary matrix grid, return the length of the shortest clear path in the matrix. If there is no clear path, return -1.

// A clear path in a binary matrix is a path from the top-left cell (i.e., (0, 0)) to the bottom-right cell (i.e., (n - 1, n - 1)) such that:

//     All the visited cells of the path are 0.
//     All the adjacent cells of the path are 8-directionally connected (i.e., they are different and they share an edge or a corner).

// The length of a clear path is the number of visited cells of this path.

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function shortestPathBinaryMatrix($grid) {
        $n = count($grid);
        if($grid[0][0] == 1 || $grid[$n - 1][$n - 1] == 1) return -1;

        $queue = new SplQueue();
        $queue->enqueue([0, 0, 1]);

        $directions = [[0, 1], [0, -1], [1, 0], [-1, 0], [1, 1], [1, -1], [-1, 1], [-1, -1]];

        $grid[0][0] = 1;

        while(!$queue->isEmpty()) {
            [$x, $y, $path_len] = $queue->dequeue();

            if($x == ($n - 1) && $y == ($n - 1)) return $path_len;

            foreach($directions as $direction) {
                $x_inc = $direction[0];
                $y_inc = $direction[1];

                $new_x = $x + $x_inc;
                $new_y = $y + $y_inc;

                if( $new_x >= 0 && $new_x < $n && $new_y >=0 && $new_y < $n && $grid[$new_x][$new_y] == 0) {
                    $grid[$new_x][$new_y] = 1;
                    $queue->enqueue([$new_x, $new_y, $path_len + 1]);
                }
            }
        }

        return -1;
    }
}

// $grid = [[0,0,0],[1,1,0],[1,1,0]];
$grid = [[0,0,0],[0,1,0],[0,0,0]];

$solution = new Solution();

print_r( $solution->shortestPathBinaryMatrix($grid), false);
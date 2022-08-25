<?php

// 1706

// You have a 2-D grid of size m x n representing a box, and you have n balls. The box is open on the top and bottom sides.

// Each cell in the box has a diagonal board spanning two corners of the cell that can redirect a ball to the right or to the left.

//     A board that redirects the ball to the right spans the top-left corner to the bottom-right corner and is represented in the grid as 1.
//     A board that redirects the ball to the left spans the top-right corner to the bottom-left corner and is represented in the grid as -1.

// We drop one ball at the top of each column of the box. Each ball can get stuck in the box or fall out of the bottom. A ball gets stuck if it hits a "V" shaped pattern between two boards or if a board redirects the ball into either wall of the box.

// Return an array answer of size n where answer[i] is the column that the ball falls out of at the bottom after dropping the ball from the ith column at the top, or -1 if the ball gets stuck in the box.


class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[]
     */
    function findBall($grid) {
        $result = [];
        $width = count($grid[0]);
        $higth = count($grid);
        $result = array_fill(0, $width, -1);
        for($i = 0; $i < $width; $i++) {
            $ball_pos = $i;
            $stuck = false;
            for($j = 0; $j < $higth; $j++) {
                if(($grid[$j][$ball_pos] == 1) && ($ball_pos <= ($width - 2)) &&  ($grid[$j][$ball_pos + 1] == 1)) {
                    $ball_pos++;
                    continue;
                }

                if(($grid[$j][$ball_pos] == -1) && ($ball_pos >= 1) &&  ($grid[$j][$ball_pos - 1] == -1)) {
                    $ball_pos--;
                    continue;
                }

                $stuck = true;
                break;
            }

            if(!$stuck) {
                $result[$i] = $ball_pos;
            }
        }

        return $result;
    }
}

//$grid = [[1,1,1,-1,-1],[1,1,1,-1,-1],[-1,-1,-1,1,1],[1,1,1,1,-1],[-1,-1,-1,-1,-1]];
$grid = [[-1]];

$solution = new Solution();

print_r( $solution->findBall($grid), false);
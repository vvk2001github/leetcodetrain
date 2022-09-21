<?php

// 542. 01 Matrix

// Given an m x n binary matrix mat, return the distance of the nearest 0 for each cell.

// The distance between two adjacent cells is 1.

class Solution {

    /**
     * @param Integer[][] $mat
     * @return Integer[][]
     */
    function updateMatrix($mat) {
        $m = count($mat);
        $n = count($mat[0]);
        $q = [];
        $dx_dy = [[1, 0], [-1, 0], [0, 1], [0, -1]];

        for($i = 0; $i < $m; $i++) {
            for($j = 0; $j < $n; $j++) {
                
                if($mat[$i][$j] == 0) {
                    $q[] = [$i, $j];
                } else {
                    $mat[$i][$j] = '#';
                }
            }
        }

        while(count($q) > 0) {
            $tmp = array_shift($q);
            $row = $tmp[0];
            $col = $tmp[1];
            for($j = 0; $j < 4; $j++) {
                $dx = $dx_dy[$j][0];
                $dy = $dx_dy[$j][1];
                $nr = $row + $dx;
                $nc = $col + $dy;

                if($nr >= 0 && $nr < $m && $nc >= 0 && $nc < $n && $mat[$nr][$nc] == '#') {
                    $mat[$nr][$nc] = $mat[$row][$col] + 1;
                    $q[] = [$nr, $nc];
                }
            }
        }

        return $mat;
    }
}
// $mat = [[0,0,0],[0,1,0],[0,0,0]];
$mat = [[0,0,0],[0,1,0],[1,1,1]];

$solution = new Solution();

print_r( $solution->updateMatrix($mat), false);
<?php

// 48. Rotate Image

// You are given an n x n 2D matrix representing an image, 
// rotate the image by 90 degrees (clockwise).

// You have to rotate the image in-place, 
// which means you have to modify the input 2D matrix directly. 
// DO NOT allocate another 2D matrix and do the rotation.

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    function rotate(&$matrix) {
        $n = count($matrix);
        for($i = 0; $i < $n; $i++){
            for($j = 0; $j < $i; $j++){
                [$matrix[$i][$j], $matrix[$j][$i]] = [$matrix[$j][$i], $matrix[$i][$j]];
            }
        }

        for($i = 0; $i < $n; $i++){
            for($j = 0; $j < $n / 2; $j++){
                [$matrix[$i][$j], $matrix[$i][$n - $j -1]] = [$matrix[$i][$n - $j -1], $matrix[$i][$j]];
            }
        }

        return $matrix;
    }
}

$matrix = [[1,2,3],[4,5,6],[7,8,9]];

$solution = new Solution();

print_r($solution->rotate( $matrix ), false);
<?php
// 733

// An image is represented by an m x n integer grid image where image[i][j] represents the pixel value of the image.

// You are also given three integers sr, sc, and color. 
// You should perform a flood fill on the image starting from the pixel image[sr][sc].

// To perform a flood fill, consider the starting pixel, 
// plus any pixels connected 4-directionally to the starting pixel of the same color as the starting pixel, 
// plus any pixels connected 4-directionally to those pixels (also with the same color), and so on. 
// Replace the color of all of the aforementioned pixels with color.

// Return the modified image after performing the flood fill.

class Solution {

    private $m;
    private $n;
    private $img;
    private $oldColor;
    private $newColor;

    private function doit(int $sr, int $sc): void {
        $this->img[$sr][$sc] = $this->newColor;

        if(($sr > 0) && ($this->img[$sr - 1][$sc] == $this->oldColor)) $this->doit($sr - 1, $sc);
        if(($sr < ($this->m - 1)) && ($this->img[$sr + 1][$sc] == $this->oldColor)) $this->doit($sr + 1, $sc);
        if(($sc > 0) && ($this->img[$sr][$sc - 1] == $this->oldColor)) $this->doit($sr, $sc - 1);
        if(($sc < ($this->n - 1)) && ($this->img[$sr][$sc + 1] == $this->oldColor)) $this->doit($sr, $sc + 1);
    }

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color) {
        if($image[$sr][$sc] == $color) return $image;

        $this->m = count($image);
        $this->n = count($image[0]);
        $this->img = $image;
        $this->oldColor = $image[$sr][$sc];
        $this->newColor = $color;

        $this->doit($sr, $sc);

        return $this->img;
    }
}

// $image = [[1,1,1],[1,1,0],[1,0,1]];
// $sr = 1;
// $sc = 1;
// $color = 2;

$image = [[0,0,0],[0,0,0]];
$sr = 1;
$sc = 0;
$color = 2;

$solution = new Solution();

print_r( $solution->floodFill($image, $sr, $sc, $color), false);
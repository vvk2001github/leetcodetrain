<?php
// You are given an integer array height of length n. There are n vertical lines drawn such that the two endpoints of the ith line are (i, 0) and (i, height[i]).

// Find two lines that together with the x-axis form a container, such that the container contains the most water.

// Return the maximum amount of water a container can store.

// Notice that you may not slant the container.

class Solution {

    /**
     * @param int[] $height
     * @return int
     */
    function maxArea($height) {
        $max = 0;
        $count = count(($height));
        $start = 0;
        $end = $count - 1;
        
        while($start < $end)  {
            $new_max = ($end - $start) * min($height[$start], $height[$end]);
            if($new_max > $max) $max = $new_max;
            if($height[$start] > $height[$end]) {
                $end--;
            } else {
                $start++;
            }
        }

        return $max;
        
    }
}

$solution = new Solution();

//$height = [1,8,6,2,5,4,8,3,7];
$height = [1,8,6,2,5,4,8,3,7];

print_r($solution->maxArea( $height ), false);
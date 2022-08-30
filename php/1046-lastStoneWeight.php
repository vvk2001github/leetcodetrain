<?php

// 1046

// You are given an array of integers stones where stones[i] is the weight of the ith stone.

// We are playing a game with the stones. 
// On each turn, we choose the heaviest two stones and smash them together. 
// Suppose the heaviest two stones have weights x and y with x <= y. The result of this smash is:

//     If x == y, both stones are destroyed, and
//     If x != y, the stone of weight x is destroyed, and the stone of weight y has new weight y - x.

// At the end of the game, there is at most one stone left.

// Return the weight of the last remaining stone. If there are no stones left, return 0.

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        while(count($stones) > 1) {
            $max1 = max($stones);
            $key1  = array_search($max1, $stones);
            unset($stones[$key1]);

            $max2 = max($stones);
            $key2  = array_search($max2, $stones);
            unset($stones[$key2]);

            if($max1 == $max2) continue;

            $stones[] = $max1 - $max2;
        }

        if(count($stones) == 0) {
            return 0;
        } else {
            $result = array_values($stones);
            return $result[0];
        }
    }
}

//$stones = [2,7,4,1,8,1];
$stones = [1];

$solution = new Solution();

print_r( $solution->lastStoneWeight($stones), false);
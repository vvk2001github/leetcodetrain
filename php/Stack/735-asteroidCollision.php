<?php

// 735. Asteroid Collision

// We are given an array asteroids of integers representing asteroids in a row.

// For each asteroid, 
// the absolute value represents its size, 
// and the sign represents its direction (positive meaning right, negative meaning left). 
// Each asteroid moves at the same speed.

// Find out the state of the asteroids after all collisions. 
// If two asteroids meet, the smaller one will explode. 
// If both are the same size, both will explode. 
// Two asteroids moving in the same direction will never meet.

class Solution {

    /**
     * @param int[] $asteroids
     * @return int[]
     */
    function asteroidCollision($asteroids) {
        $result = [];
        $count = count($asteroids);
        for($i = 0; $i < $count; $i++) {
            if(count($result) == 0) {
                $result[] = $asteroids[$i];
                continue;
            }

            $current = $asteroids[$i];
            
            if($current > 0) {
                $result[] = $current;
                continue;
            }

            if($current < 0) {
                $explodeCurrent = false;
                for($j = count($result) - 1; $j >= 0; $j--) {

                    if($result[$j] < 0) continue;

                    if(abs($current) == $result[$j]){
                        unset($result[$j]);
                        $explodeCurrent = true;
                        break;
                    }
                    if(abs($current) > $result[$j]) {
                        unset($result[$j]);
                        continue;
                    }
                    if(abs($current) < $result[$j]) {
                        $explodeCurrent = true;
                        break;
                    }
                }
                $result = array_values($result);
                if(!$explodeCurrent) $result[] = $current;
            }
        }

        return $result;
    }
}

// $asteroids = [5,10,-5];
// $asteroids = [8,-8];
// $asteroids = [10,2,-5];
// $asteroids = [-2,-1,1,2];
$asteroids = [1,-2,1,-2];


$solution = new Solution();

print_r($solution->asteroidCollision( $asteroids ), false);
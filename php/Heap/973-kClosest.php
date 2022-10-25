<?php

// 973. K Closest Points to Origin

// Given an array of points where points[i] = [xi, yi] 
// represents a point on the X-Y plane and an integer k, r
// eturn the k closest points to the origin (0, 0).

// The distance between two points on the X-Y plane is the Euclidean distance (i.e., √(x1 - x2)2 + (y1 - y2)2).

// You may return the answer in any order. 
// The answer is guaranteed to be unique (except for the order that it is in).

class Solution {

    /**
     * @param int[][] $points
     * @param int $k
     * @return Integer[][]
     */
    function kClosest($points, $k) {
        $count_points = count($points);
        $distances = [];

        for($i = 0; $i < $count_points; $i++) {
            $distances[$i] = sqrt( $points[$i][0]*$points[$i][0] + $points[$i][1]*$points[$i][1]);
        }
        asort($distances);

        $slice = array_slice($distances, 0, $k, true);

        $keys = array_keys($slice);
        $result = [];

        for($i = 0; $i < $k; $i++) {
            $key = $keys[$i];
            $result[] = $points[$key];
        }

        return $result;
    }
}

// $points = [[1,3],[-2,2]]; $k = 1;
$points = [[3,3],[5,-1],[-2,4]]; $k = 2;

$solution = new Solution();

print_r( $solution->kClosest($points, $k), false);
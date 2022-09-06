<?php

// 56. Merge Intervals

// Given an array of intervals 
// where intervals[i] = [starti, endi], 
// merge all overlapping intervals, 
// and return an array of the non-overlapping intervals that cover all the intervals in the input.

class Solution {


    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {

        usort($intervals, function($a, $b) {
            return $a[0] - $b[0];
        });

        $countInt = count($intervals);
        $i = 0;
        while($i < $countInt - 1) {
            if($intervals[$i][0] <= $intervals[$i+1][0] && $intervals[$i][1] >= $intervals[$i+1][0]) {
                $newInterval = [min($intervals[$i][0], $intervals[$i + 1][0]), max($intervals[$i][1], $intervals[$i+1][1])];
                unset($intervals[$i]);
                $intervals[$i+1] = $newInterval;
            }
            $i++;
        }
        return $intervals;
    }
}

// $intervals = [[1,3],[2,6],[8,10],[15,18]];
$intervals = [[1,4],[0,4]];

$solution = new Solution();

print_r($solution->merge( $intervals ), false);
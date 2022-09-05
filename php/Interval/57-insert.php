<?php

// 57. Insert Interval

// You are given an array of non-overlapping intervals intervals where 
// intervals[i] = [starti, endi] represent the start and the end of the ith interval 
// and intervals is sorted in ascending order by starti. 
// You are also given an interval newInterval = [start, end] that represents the start and end of another interval.

// Insert newInterval into intervals such that intervals is still sorted in ascending order by starti 
// and intervals still does not have any overlapping intervals (merge overlapping intervals if necessary).

// Return intervals after the insertion.

class Solution {

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval) {
        $result = [];
        $countInt = count($intervals);

        for($i = 0; $i < $countInt; $i++) {
            if($newInterval[1] < $intervals[$i][0]) {
                $result[] = $newInterval;
                for($j = $i; $j < $countInt; $j++) {
                    $result[] = $intervals[$j];
                }
                return $result;
            } elseif($newInterval[0] > $intervals[$i][1]) {
                $result[] = $intervals[$i];
            } else {
                $newInterval = [min($newInterval[0], $intervals[$i][0]), max($newInterval[1], $intervals[$i][1])];
            }
        }

        $result[] = $newInterval;

        return $result;
    }
}

// $intervals = [[1,3],[6,9]]; $newInterval = [2,5];
$intervals = [[1,2],[3,5],[6,7],[8,10],[12,16]]; $newInterval = [4, 8];
// $intervals = [[1,5]]; $newInterval = [6, 8];

$solution = new Solution();

print_r($solution->insert( $intervals, $newInterval ), false);
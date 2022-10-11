<?php

// 435. Non-overlapping Intervals

// Given an array of intervals intervals where intervals[i] = [starti, endi], 
// return the minimum number of intervals you need to remove to make the rest of the intervals non-overlapping.

class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
        $countIntervals = count($intervals);

        if($countIntervals == 1) return 0;

        $result = 0;

        sort($intervals);
        $end = $intervals[0][1];

        for($i = 1; $i < $countIntervals; $i++) {
            [$currentStart, $currentEnd] = $intervals[$i];

            if($currentStart < $end) {
                $result++;
                $end = min($end, $currentEnd);
                continue;
            }

            $end = $currentEnd;
        }

        return $result;
    }
}

// $intervals = [[1,2],[2,3],[3,4],[1,3]];
$intervals = [[1,2],[1,2],[1,2]];

$solution = new Solution();

print_r( $solution->eraseOverlapIntervals($intervals), false);
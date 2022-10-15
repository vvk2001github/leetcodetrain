<?php

// 986. Interval List Intersections

// You are given two lists of closed intervals, 
// firstList and secondList, 
// where firstList[i] = [starti, endi] and secondList[j] = [startj, endj]. 
// Each list of intervals is pairwise disjoint and in sorted order.

// Return the intersection of these two interval lists.

// A closed interval [a, b] (with a <= b) denotes the set of real numbers x with a <= x <= b.

// The intersection of two closed intervals is a set of real numbers 
// that are either empty or represented as a closed interval. 
// For example, the intersection of [1, 3] and [2, 4] is [2, 3].

class Solution {

    /**
     * @param Integer[][] $firstList
     * @param Integer[][] $secondList
     * @return Integer[][]
     */
    function intervalIntersection($firstList, $secondList) {
        $countFirst = count($firstList);
        $countSecond = count($secondList);
        $pointerFirts = 0;
        $pointerSecond = 0;

        $result = [];

        while($pointerFirts < $countFirst && $pointerSecond < $countSecond) {
            
            // First I left then second
            if($firstList[$pointerFirts][0] < $secondList[$pointerSecond][0] && $firstList[$pointerFirts][1] < $secondList[$pointerSecond][0]) {
                $pointerFirts++;
                continue;
            }

            // Second Int left then first
            if($firstList[$pointerFirts][0] > $secondList[$pointerSecond][1] && $firstList[$pointerFirts][1] > $secondList[$pointerSecond][1]) {
                $pointerSecond++;
                continue;
            }

            // Fisrt I into second
            if($firstList[$pointerFirts][0] >= $secondList[$pointerSecond][0] && $firstList[$pointerFirts][1] <= $secondList[$pointerSecond][1]) {
                $result[] = $firstList[$pointerFirts];
                $pointerFirts++;
                continue;
            }

            // Second into first
            if($firstList[$pointerFirts][0] <= $secondList[$pointerSecond][0] && $firstList[$pointerFirts][1] >= $secondList[$pointerSecond][1]) {
                $result[] = $secondList[$pointerSecond];
                $pointerSecond++;
                continue;
            }


            if($firstList[$pointerFirts][1] >= $secondList[$pointerSecond][0] && $firstList[$pointerFirts][1] <= $secondList[$pointerSecond][1]) {
                $result[] = [$secondList[$pointerSecond][0], $firstList[$pointerFirts][1]];
                $pointerFirts++;
                continue;
            }

            if($firstList[$pointerFirts][0] <= $secondList[$pointerSecond][1] && $firstList[$pointerFirts][1] >= $secondList[$pointerSecond][1]) {
                $result[] = [$firstList[$pointerFirts][0], $secondList[$pointerSecond][1]];
                $pointerSecond++;
                continue;
            }

        }

        return $result;
    }
}

$firstList = [[0,2],[5,10],[13,23],[24,25]];
$secondList = [[1,5],[8,12],[15,24],[25,26]];

$solution = new Solution();

print_r( $solution->intervalIntersection($firstList, $secondList), false);
<?php

// 228. Summary Ranges

// You are given a sorted unique integer array nums.

// A range [a,b] is the set of all integers from a to b (inclusive).

// Return the smallest sorted list of ranges that cover all the numbers in the array exactly. 
// That is, each element of nums is covered by exactly one of the ranges, 
// and there is no integer x such that x is in one of the ranges but not in nums.

// Each range [a,b] in the list should be output as:

//     "a->b" if a != b
//     "a" if a == b


class Solution {

    /**
     * @param int[] $nums
     * @return String[]
     */
    function summaryRanges($nums) {
        $countNums = count($nums);
        $start = 0;
        $end = 0;
        $res = [];

        while($end < $countNums - 1) {
            
            while($end < $countNums - 1 && $nums[$end] + 1 == $nums[$end + 1]) {
                $end++;
            }

            $res[] = [$nums[$start], $nums[$end]];
            $start = $end + 1;
            $end = $start;
        }

        if($end < $countNums && $start < $countNums) {
            $res[] = [$nums[$start], $nums[$end]];
        }
        
        $result = [];
        $countRes = count($res);
        for($i = 0; $i < $countRes; $i++) {
            if($res[$i][0] == $res[$i][1]) {
                $result[] = strval($res[$i][0]);
            } else {
                $result[] = $res[$i][0].'->'.$res[$i][1];
            }
        }

        return $result;
    }
}

$nums = [0,1,2,4,5,7];
// $nums = [0,2,3,4,6,8,9];

$solution = new Solution();

print_r($solution->summaryRanges( $nums ), false);
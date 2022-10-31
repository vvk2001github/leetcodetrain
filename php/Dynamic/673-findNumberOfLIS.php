<?php

// 673. Number of Longest Increasing Subsequence

// Given an integer array nums, return the number of longest increasing subsequences.

// Notice that the sequence has to be strictly increasing.

class Solution {

    function __construct() {
        
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findNumberOfLIS($nums) {
        $countNums = count($nums);
        $dp = [];
        $lenLIS = 0;
        $res = 0;
        for($i = $countNums - 1; $i >= 0; $i--) {
            $maxLen = 1;
            $maxCnt = 1;
            for($j = $i + 1; $j < $countNums; $j++) {
                if($nums[$j] > $nums[$i]) {
                    $length = $dp[$j][0];
                    $count = $dp[$j][1];

                    if($length + 1 > $maxLen) {
                        $maxLen = $length + 1;
                        $maxCnt = $count;
                    } elseif($length + 1 == $maxLen) {
                        $maxCnt += $count;
                    }

                }
            }

            if($maxLen > $lenLIS) {
                $lenLIS = $maxLen;
                $res = $maxCnt;
            } elseif($lenLIS == $maxLen) {
                $res += $maxCnt;
            }

            $dp[$i] = [$maxLen, $maxCnt];
        }

        return $res;
    }
}

// $nums = [10,9,2,5,3,7,101,18];
$nums = [1,3,5,4,7];
// $nums = [2, 2, 2, 2, 2];

$solution = new Solution();

print_r($solution->findNumberOfLIS( $nums ), false);
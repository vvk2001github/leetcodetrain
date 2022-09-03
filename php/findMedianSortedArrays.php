<?php
// Given two sorted arrays nums1 and nums2 of size m and n respectively, return the median of the two sorted arrays.

// The overall run time complexity should be O(log (m+n)).

class Solution {

    /**
     * @param int[] $nums1
     * @param int[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        $merged = array_merge($nums1, $nums2);
        sort($merged);
        $c = count($merged);

        if(($c % 2) == 0) {
            $tmp = (int)($c / 2);
            $result = ( $merged[$tmp - 1] + $merged[$tmp] ) / 2;
            return $result;
        } else {
            $tmp = (int)($c / 2);
            return $merged[$tmp];
        }
    }
}

$solution = new Solution();

$nums1 = [1,2];
$nums2 = [3,4];

print_r($solution->findMedianSortedArrays( $nums1, $nums2 ), false);
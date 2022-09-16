<?php

// 350. Intersection of Two Arrays II

// Given two integer arrays nums1 and nums2, 
// return an array of their intersection. 
// Each element in the result must appear as many times as it shows in both arrays 
// and you may return the result in any order.

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    function intersect($nums1, $nums2) {
        if(count($nums1) < count($nums2)) [$nums1, $nums2] = [$nums2, $nums1];
        $countNums2 = count($nums2);
        $result = [];
        for($i = 0; $i < $countNums2; $i++) {
            if(in_array($nums2[$i], $nums1)) {
                $tmp = min(array_count_values($nums1)[$nums2[$i]], array_count_values($nums2)[$nums2[$i]]);
                if(!in_array($nums2[$i], $result) || array_count_values($result)[$nums2[$i]] < $tmp)  $result[] = $nums2[$i];
            }
        }
        
        return $result;
    }
}

// $nums1 = [1,2,2,1]; $nums2 = [2,2];
// $nums1 = [4,9,5]; $nums2 =  [9,4,9,8,4];
$nums1 = [1, 2]; $nums2 =  [1, 1];


$solution = new Solution();

print_r($solution->intersect( $nums1, $nums2 ), false);
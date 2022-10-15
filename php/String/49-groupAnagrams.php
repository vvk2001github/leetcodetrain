<?php

// 49. Group Anagrams

// Given an array of strings strs, group the anagrams together. 
// You can return the answer in any order.

// An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
// typically using all the original letters exactly once.

class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {

        $result = [];
        $countStrs = count($strs);
        $ord_a = ord('a');
        for($i = 0; $i < $countStrs; $i++) {
            $count = array_fill(0, 26, 0);
            
            $len = strlen($strs[$i]);

            for($c = 0; $c < $len; $c++) {
                $count[ord($strs[$i][$c]) - $ord_a] += 1;
            }

            $str_count = implode(' ', $count);
            $result[$str_count][] = $strs[$i];
        }

        return array_values($result);
    }
}

// $strs = ["eat","tea","tan","ate","nat","bat"];
$strs = ["bdddddddddd","bbbbbbbbbbc"];

$solution = new Solution();

print_r( $solution->groupAnagrams($strs), false);
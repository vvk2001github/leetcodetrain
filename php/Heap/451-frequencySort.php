<?php

// 451. Sort Characters By Frequency

// Given a string s, sort it in decreasing order based on the frequency of the characters. 
// The frequency of a character is the number of times it appears in the string.

// Return the sorted string. If there are multiple answers, return any of them.

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s) {
        $len = strlen($s);
        $freq = [];

        for($i = 0; $i < $len; $i++) {
            if(array_key_exists($s[$i], $freq)) {
                $freq[$s[$i]]++;
            } else {
                $freq[$s[$i]] = 1;
            }
        }

        arsort($freq);

        $keys = array_keys($freq);
        $count_keys = count($keys);
        $result = '';

        for($i = 0; $i < $count_keys; $i++) {
            $key = $keys[$i];
            for($j = 0; $j < $freq[$key]; $j++) {
                $result .= $key;
            }            
        }

        return $result;
    }
}

$s = "Aabb";

$solution = new Solution();

print_r( $solution->frequencySort($s), false);
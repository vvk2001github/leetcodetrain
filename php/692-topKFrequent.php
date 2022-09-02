<?php

// 692

// Given an array of strings words and an integer k, 
// return the k most frequent strings.

// Return the answer sorted by the frequency from highest to lowest. 
// Sort the words with the same frequency by their lexicographical order.

class Solution {

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k) {
        $count = count($words);
        $freq = [];
        $result = [];

        for($i = 0; $i < $count; $i++) {
            if(array_key_exists($words[$i], $freq)) {
                $freq[$words[$i]]++;
            } else {
                $freq[$words[$i]] = 1;
            }
        }

        for($i = 0; $i < $k; $i++) {
            $max = max($freq);
            $keys  = array_keys($freq, $max);
            sort($keys);

            $key = $keys[0];

            //$result[$key] = $freq[$key];
            $result[] = $key;

            unset($freq[$key]);
        };

        //$result = array_keys($result);

        return $result;
    }
}

// $words = ["i","love","leetcode","i","love","coding"];
// $k = 2;
// $words = ["the","day","is","sunny","the","the","the","sunny","is","is"];
// $k = 4;
$words = ["i","love","leetcode","i","love","coding"];
$k = 3;

$solution = new Solution();

print_r( $solution->topKFrequent($words, $k), false);
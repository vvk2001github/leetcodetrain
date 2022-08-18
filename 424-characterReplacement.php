<?php

// 424

// You are given a string s and an integer k. 
// You can choose any character of the string and change it to any other uppercase English character. 
// You can perform this operation at most k times.

// Return the length of the longest substring containing the same letter you can get after performing the above operations.

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function characterReplacement($s, $k) {
        //if($k == 0) return 1;
        $left = 0;
        $right = -1; 
        $result = 0;
        $a = ord('A');
        $len = strlen($s);
        $freq = array_fill(0, 26, 0);

        $winlen = 1;
        do {
            $maxfreq = max($freq);
            $winlen = $right - $left + 1;
            if($winlen - $maxfreq <= $k) {
                $result = max($result, $winlen);
                $right++;
                if($right >= $len) break;
                $freq[ord($s[$right]) - $a]++;
            } else {
                $left++;
                $winlen--;
                $freq[ord($s[$left-1]) - $a]--;
                $result = max($result, $winlen);
            }
        } while($right < $len && $left < $len);

        return $result;
    }
}

$s = "ABAA";
$k = 0;

$solution = new Solution();

print_r( $solution->characterReplacement($s, $k), false);

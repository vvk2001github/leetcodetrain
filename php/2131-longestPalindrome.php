<?php

// 2131

// You are given an array of strings words. 
// Each element of words consists of two lowercase English letters.

// Create the longest possible palindrome by selecting some elements from words and concatenating them in any order. 
// Each element can be selected at most once.

// Return the length of the longest palindrome that you can create. If it is impossible to create any palindrome, return 0.

// A palindrome is a string that reads the same forward and backward.


class Solution {

    /**
     * @param String[] $words
     * @return Integer
     */
    function longestPalindrome($words) {

        $ord_a = ord('a');
        $result = 0;
        $counter = array_fill(0, 26, []);
        for($i = 0; $i < 26; $i++) {
            $counter[$i] = array_fill(0, 26, 0);
        }

        foreach($words as $word) {
            $a = ord($word[0]) - $ord_a;
            $b = ord($word[1]) - $ord_a;
            if($counter[$b][$a] > 0) {
                $result += 4;
                $counter[$b][$a]--;
            } else {
                $counter[$a][$b]++;
            }
        }

        for($i = 0; $i < 26; $i++) {
            if($counter[$i][$i] > 0) {
                $result += 2;
                break;
            }
        }
        

        return $result;
    }
}

 $words = ["lc","cl","gg"];
//$words = ["ab","ty","yt","lc","cl","ab"];
//$words = ["cc","ll","xx"];

$solution = new Solution();

print_r( $solution->longestPalindrome($words), false);
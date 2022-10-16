<?php
// Given a string s which consists of lowercase or uppercase letters, 
// return the length of the longest palindrome that can be built with those letters.

// Letters are case sensitive, for example, "Aa" is not considered a palindrome here.

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s) {
        $map = [];
        for($i = 0; $i < strlen($s); $i++) {
            if(array_key_exists($s[$i], $map)) {
                $map[$s[$i]]++;
            } else {
                $map[$s[$i]] = 1;
            }
        }

        $result = 0;
        $hasOdd = 0;

        foreach($map as $char => $count) {
            if(($count % 2) === 0) {
                $result += $count;
            } else {
                $result += $count - 1;
                $hasOdd = 1;
            }
        }

        return $result + $hasOdd;
    }
}

$solution = new Solution();
$s = "abccccddzz";

print_r($solution->longestPalindrome( $s ), false);

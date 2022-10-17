<?php

// 187. Repeated DNA Sequences

// The DNA sequence is composed of a series of nucleotides abbreviated as 'A', 'C', 'G', and 'T'.

//     For example, "ACGAATTCCG" is a DNA sequence.

// When studying DNA, it is useful to identify repeated sequences within the DNA.

// Given a string s that represents a DNA sequence, 
// return all the 10-letter-long sequences (substrings) that occur more than once in a DNA molecule. 
// You may return the answer in any order.

class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function findRepeatedDnaSequences($s) {
        $len = strlen($s);

        $result = [];

        $hash = [];

        for($i = 0; $i < ($len - 9); $i++) {
            $tmpStr = substr($s, $i, 10);
            if(!isset($hash[$tmpStr])) {
                $hash[$tmpStr] = 1;
            } elseif($hash[$tmpStr] == 1) {
                $result[] = $tmpStr;
                $hash[$tmpStr]++;
            }

        }

        return $result;
    }
}

// $s = "AAAAACCCCCAAAAACCCCCCAAAAAGGGTTT";
// $s = "AAAAAAAAAAAAA";
$s = "AAAAAAAAAAA";

$solution = new Solution();

print_r( $solution->findRepeatedDnaSequences($s), false);
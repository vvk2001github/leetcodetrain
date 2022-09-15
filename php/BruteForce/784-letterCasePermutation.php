<?php

// 784. Letter Case Permutation

// Given a string s, you can transform every letter individually to be lowercase or uppercase to create another string.

// Return a list of all possible strings we could create. Return the output in any order.

class Solution {

    /**
     * @param String $s
     * @return String[]
     */
    function letterCasePermutation($s) {
        $result =[];
        $len = strlen($s);
        $cache = [];
        for($i = 0; $i < $len; $i++) {
            if($s[$i] >= 'a' && $s[$i] <= 'z') $cache[] = $i;
            if($s[$i] >= 'A' && $s[$i] <= 'Z') $cache[] = $i;
        }

        $stringArr = str_split($s, 1);
        $countCache = count($cache);
        $countCache2 = 2 ** $countCache;

        for($i = 0; $i < $countCache2; $i++) {
            $binaryStr = decbin($i);
            $binaryStr = str_pad($binaryStr, $countCache, '0', STR_PAD_LEFT);
            for($j = 0; $j < $countCache; $j++) {
                if($binaryStr[$j] == '0') {
                    $stringArr[$cache[$j]] = strtolower($stringArr[$cache[$j]]);
                } else {
                    $stringArr[$cache[$j]] = strtoupper($stringArr[$cache[$j]]);
                }
            }
            $result[] = implode('', $stringArr);
        }

        return $result;
    }
}
$s = "a1b2";
// $s = "3z4";

$solution = new Solution();

print_r($solution->letterCasePermutation( $s ), false);
<?php

// 139. Word Break

// Given a string s and a dictionary of strings wordDict, return true if s can be segmented into a space-separated sequence of one or more dictionary words.

// Note that the same word in the dictionary may be reused multiple times in the segmentation.

class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    function wordBreak($s, $wordDict) {

        $len = strlen($s);
        $dp = array_fill(0, $len + 1, false);
        $dp[$len] = true;

        for($i = $len - 1; $i >=0; $i--) {
            foreach($wordDict as $w) {

                $len_w = strlen($w);
                // $sub = substr($s, $i, $i + $len_w);
                $sub = substr($s, $i, $len_w);

                if( ($i + $len_w <= $len) && ($sub == $w) ) {
                    $dp[$i] = $dp[$i + $len_w];
                }

                if($dp[$i]) {
                    break;
                }
            }
        }

        return $dp[0];
    }
}

// $s = "leetcode"; $wordDict = ["leet","code"];
$s = "applepenapple"; $wordDict = ["apple","pen"];
// $s = "catsandog"; $wordDict = ["cats","dog","sand","and","cat"];

$solution = new Solution();

print_r($solution->wordBreak( $s, $wordDict ), false);
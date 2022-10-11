<?php

// 763. Partition Labels

// You are given a string s. 
// We want to partition the string into as many parts as possible 
// so that each letter appears in at most one part.

// Note that the partition is done so that after concatenating all the parts in order, 
// the resultant string should be s.

// Return a list of integers representing the size of these parts.

class Solution {

    /**
     * @param String $s
     * @return Integer[]
     */
    function partitionLabels($s) {
        $len = strlen($s);
        $cache = [];
        
        for($i = 0; $i < $len; $i++) {
            if(!array_key_exists($s[$i], $cache)) {
                $cache[$s[$i]] = [strpos($s, $s[$i]), strrpos($s, $s[$i])];
            }
        }

        $cache = array_values($cache);

        $countCache = count($cache);

        if($countCache == 1) return [$cache[0][1] - $cache[0][0] + 1];
        
        $intervals[] = $cache[0];
        $curInt = 0;
        for($i = 1; $i < $countCache; $i++) {
            if($cache[$i][0] <= $intervals[$curInt][1]) {
                $intervals[$curInt][1] = max($intervals[$curInt][1], $cache[$i][1]);
            } else {
                $curInt++;
                $intervals[] = $cache[$i];
            }
        }
        
        $result = [];
        $curInt++;
        for($i = 0; $i < $curInt; $i++) {
            $result[] = $intervals[$i][1] - $intervals[$i][0] + 1;
        }

        return $result;
    }
}

$s = "ababcbacadefegdehijhklij";
// $s = 'aaa';

$solution = new Solution();

print_r( $solution->partitionLabels($s), false);
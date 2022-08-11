<?php

// 278

// You are a product manager and currently leading a team to develop a new product. 
// Unfortunately, the latest version of your product fails the quality check. 
// Since each version is developed based on the previous version, all the versions after a bad version are also bad.

// Suppose you have n versions [1, 2, ..., n] and you want to find out the first bad one, 
// which causes all the following ones to be bad.

// You are given an API bool isBadVersion(version) which returns whether version is bad. 
// Implement a function to find the first bad version. You should minimize the number of calls to the API.

/* The isBadVersion API is defined in the parent class VersionControl.
      public function isBadVersion($version){} */


class Solution extends VersionControl {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $left = 1;
        $right = $n;
        
        while ($left < $right) {
            $cur = floor(($left + $right) / 2);
            
            if( $this->isBadVersion($cur)) {
                $right = $cur;
            } else {
                $left = $cur + 1;
            }
        }
        
        return $right;
    }
}

$n = 5;
$bad = 4;

$solution = new Solution();

print_r($solution->firstBadVersion( $n ), false);
<?php

// 171. Excel Sheet Column Number

// Given a string columnTitle that represents the column title as appears in an Excel sheet, 
// return its corresponding column number.

// For example:

// A -> 1
// B -> 2
// C -> 3
// ...
// Z -> 26
// AA -> 27
// AB -> 28 
// ...

class Solution {

    /**
     * @param String $columnTitle
     * @return Integer
     */
    function titleToNumber($columnTitle) {
        $len = strlen($columnTitle);
        $ord_A = ord('A');
        $result = 0;

        $revTitle = strrev($columnTitle);

        for($i = 0; $i < $len; $i++) {
            $result = $result + pow(26, $i) * (ord($revTitle[$i]) - $ord_A + 1);
        }

        return $result;
    }
}

$columnTitle = "A";

$solution = new Solution();

print_r($solution->titleToNumber( $columnTitle ), false);
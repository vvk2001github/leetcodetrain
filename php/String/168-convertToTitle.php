<?php

// 168. Excel Sheet Column Title

// Given an integer columnNumber, return its corresponding column title as it appears in an Excel sheet.

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
     * @param int $columnNumber
     * @return String
     */
    function convertToTitle($columnNumber) {
        
        $result = '';
        $ord_A = ord('A');

        while($columnNumber > 26) {
            $tmp = $columnNumber % 26;
            
            $columnNumber = floor($columnNumber / 26);
            $columnNumber = $tmp == 0 ? $columnNumber - 1 : $columnNumber;

            $chr = $tmp == 0 ? 'Z' : chr($tmp + $ord_A - 1);

            $result = $chr . $result;
        }

        // $chr = $tmp == 0 ? 'Z' : chr($tmp + $ord_A - 1);
        
        return chr($columnNumber + $ord_A - 1) . $result;
    }
}

$columnNumber = 28;

$solution = new Solution();

print_r($solution->convertToTitle( $columnNumber ), false);
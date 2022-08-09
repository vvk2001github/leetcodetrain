<?php
// Given a string containing digits from 2-9 inclusive, 
// return all possible letter combinations that the number could represent. 
// Return the answer in any order.

// A mapping of digits to letters (just like on the telephone buttons) is given below. 
// Note that 1 does not map to any letters.

class Solution {

    function all_combination($params) {
        if(count($params) == 1) {
            $result = [];
            for($i = 0; $i < strlen($params[0]); $i++) {
                $result[] = $params[0][$i];
            }

            return $result;
        }

        $result = [];
        $shifted = array_shift($params);
        $shifted_len = strlen($shifted);

        $tmp = $this->all_combination($params);
        $tmp_len = count($tmp);

        for ($i = 0; $i < $shifted_len; $i++) {
            for ($j = 0; $j < $tmp_len; $j++) {
                $result[] = $shifted[$i] . $tmp[$j];
            }
        }

        return $result;

    }

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {

        if(empty($digits)) return [];

        $mapping = [];
        $mapping['2'] = 'abc';
        $mapping['3'] = 'def';
        $mapping['4'] = 'ghi';
        $mapping['5'] = 'jkl';
        $mapping['6'] = 'mno';
        $mapping['7'] = 'pqrs';
        $mapping['8'] = 'tuv';
        $mapping['9'] = 'wxyz';

        $result = [];
        $length = strlen($digits);
        $new_array = [];

        for($i = 0; $i < $length; $i++) {
            $new_array[] = $mapping[$digits[$i]];
        }

        

        $result = $this->all_combination($new_array);

        return $result;        
    }
}

$solution = new Solution();

$digits = "2";

print_r($solution->letterCombinations( $digits ), false);

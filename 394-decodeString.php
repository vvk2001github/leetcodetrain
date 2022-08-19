<?php

// 394

// Given an encoded string, return its decoded string.

// The encoding rule is: k[encoded_string], 
// where the encoded_string inside the square brackets is being repeated exactly k times. 
// Note that k is guaranteed to be a positive integer.

// You may assume that the input string is always valid; 
// there are no extra white spaces, square brackets are well-formed, etc. 
// Furthermore, you may assume that the original data does not contain any digits 
// and that digits are only for those repeat numbers, k. 
// For example, there will not be input like 3a or 2[4].

// The test cases are generated so that the length of the output will never exceed 10^5.

class Solution {

    private $numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];


    private function getNum(string $str): string {
        $num = '';
        $len = strlen($str);
        $i = 0;
        while (($i < $len) && in_array($str[$i], $this->numbers)) {
                $num .= $str[$i];
                $i++;
            }
        return $num;
    }

    private function getLetters(string  $str): string {
        $result = '';
        $i = 0;
        while($i < strlen($str) && $str[$i] >= 'a' && $str[$i] <= 'z') {
            $result .= $str[$i];
            $i++;
        }
        return $result;
    }

    private function getSubRes(string $str): string {
        $count = 0;
        $i = 0;
        do {
            if($str[$i] == '[') {
                $count++;
                // $this->i++;
            }
            if($str[$i] == ']') {
                $count--;
                //$this->i -= 2;
            }
            $i++;
        } while($count <> 0);
        $this->i = $i;
        return $this->helper(substr($str, 1, $i - 2));
    }

    private function helper(string $str): string {
        if(empty($str)) return '';
        $result = '';
            
            if(in_array($str[0], $this->numbers)) {
                $num = $this->getNum($str);
                $num_num = intval($num);
                $tmp_str = substr($str, strlen($num));
                $tmp_res = $this->helper($tmp_str);
                for($j = 0; $j < $num_num; $j++) {
                    $result = $result . $tmp_res;
                }
                return $result;   
            };

            if($str[0] >= 'a' && $str[0] <= 'z') {
                $tmp_res = $this->getLetters($str);
                $result = $tmp_res . $this->helper(substr($str, strlen($tmp_res)));
                return $result;
            }

            if($str[0] == '[') {
                $tmp_res = $this->getSubRes($str);
                $result = $result . $tmp_res;
                return $result;
            }
        
        return $result;
    }


    /**
     * @param String $s
     * @return String
     */
    function decodeString($s) {
        $result = '';
        $len = strlen($s);

        
            $result = $result . $this->helper($s);
        

        return $result;
    }
}

$s = "3[a2[c]]";
//$s = "3[a]2[bc]";
//$s = "2[abc]3[cd]ef";

$solution = new Solution();

print_r( $solution->decodeString($s), false);
<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        
        $shortest_string = $strs[0];
        $shortest_string_length = strlen($shortest_string);

        foreach($strs as $str) {
            if(strlen($str) < $shortest_string_length) {
                $shortest_string = $str;
                $shortest_string_length = strlen($shortest_string);   
            }
        }

        $hasThisPrefix = true;

        while($shortest_string_length > 0) {
            $hasThisPrefix = true;
            foreach($strs as $str) {
                if(!str_starts_with($str, $shortest_string)) {
                    $hasThisPrefix = false;
                    //echo $shortest_string."\n";
                    break;
                }
            }
            if($hasThisPrefix) {
                break;
            } else {
                $shortest_string = substr($shortest_string, 0, $shortest_string_length - 1);
                $shortest_string_length = strlen($shortest_string);
            }
        }

        return $shortest_string;

    }
}

$solution = new Solution();
$strs = ["flower","flow","flight"];
//$strs = ["dog","racecar","car"];
//$strs = ["flower","fkow"];

echo $solution->longestCommonPrefix($strs)."\n";

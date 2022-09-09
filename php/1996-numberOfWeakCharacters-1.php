<?php

// 1996. The Number of Weak Characters in the Game

// !!!
// !!!40 / 44 test cases passed.!!!
// !!! Time Limit Exceeded
// !!!

// You are playing a game that contains multiple characters, 
// and each of the characters has two main properties: attack and defense. 
// You are given a 2D integer array properties where properties[i] = [attacki, defensei] represents the properties of the ith character in the game.

// A character is said to be weak if any other character has both attack 
// and defense levels strictly greater than this character's attack and defense levels. 
// More formally, a character i is said to be weak if there exists another character j where attackj > attacki and defensej > defensei.

// Return the number of weak characters.

class Solution {

    /**
     * @param Integer[][] $properties
     * @return Integer
     */
    function numberOfWeakCharacters($properties) {
        $countProps = count($properties);
        $groups = [];
        $result = 0;

        for($i = 0; $i < $countProps; $i++) {
            $groups[$properties[$i][0]][] = $properties[$i][1];
        }

        ksort($groups);
        $groups = array_values($groups);
        $countTmp = count($groups);

        $maxDef = -1;
        
        for($i = $countTmp - 1; $i >=0; $i--) {
            foreach($groups[$i] as $defense) {
                if($defense < $maxDef) $result++;
            }

            $maxDef = max($maxDef, max($groups[$i]));
        }


        return $result;
    }
}

// $properties = [[5,5],[6,3],[3,6]];
$properties = [[1,5],[10,4],[4,3]];
// $properties = [[10,1],[5,1],[7,10],[4,1],[5,9],[6,9],[7,2],[1,10]];

$solution = new Solution();

print_r($solution->numberOfWeakCharacters( $properties ), false);
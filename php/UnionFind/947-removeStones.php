<?php


// 947. Most Stones Removed with Same Row or Column

// On a 2D plane, we place n stones at some integer coordinate points. 
// Each coordinate point may have at most one stone.

// A stone can be removed if it shares either the same row or the same column as another stone that has not been removed.

// Given an array stones of length n where stones[i] = [xi, yi] represents the location of the ith stone, 
// return the largest possible number of stones that can be removed.

class Solution {

    private array $visited;
    private array $stones;
    private int $countStones;
    private int $countGroups;

    

    private function foo(int $i): void {
        for($j = 0; $j < $this->countStones; $j++){
            if(!$this->visited[$j] && ($this->stones[$i][0] == $this->stones[$j][0] || $this->stones[$i][1] == $this->stones[$j][1])) {
                $this->visited[$j] = true;
                $this->foo($j);
            }
        }
    }


    /**
     * @param Integer[][] $stones
     * @return Integer
     */
    function removeStones($stones) {
        $this->countStones = count($stones);
        $this->countGroups = 0;
        $this->visited = array_fill(0, $this->countStones, false);
        $this->stones = $stones;

        for($i = 0; $i < $this->countStones; $i++) {
            if(!$this->visited[$i]) {
                $this->foo($i);
                $this->countGroups++;
            }
        }

        return $this->countStones - $this->countGroups;
    }
}
// $stones = [[0,0],[0,1],[1,0],[1,2],[2,1],[2,2]];
$stones = [[0,0],[0,2],[1,1],[2,0],[2,2]];

$solution = new Solution();

print_r($solution->removeStones( $stones ), false);
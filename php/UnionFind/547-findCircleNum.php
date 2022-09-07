<?php

// 547. Number of Provinces

// There are n cities. 
// Some of them are connected, 
// while some are not. 
// If city a is connected directly with city b, 
// and city b is connected directly with city c, 
// then city a is connected indirectly with city c.

// A province is a group of directly or indirectly connected cities and no other cities outside of the group.

// You are given an n x n matrix isConnected 
// where isConnected[i][j] = 1 if the ith city and the jth city are directly connected, 
// and isConnected[i][j] = 0 otherwise.

// Return the total number of provinces.

class Solution {

    private array $visited;
    private array $isConnected;
    private int $countCities;
    private int $result;

    private function foo(int $i): void {
        for($j = 0; $j < $this->countCities; $j++){
            if(!$this->visited[$j] && $this->isConnected[$i][$j] == 1) {
                $this->visited[$j] = true;
                $this->foo($j);
            }
        }
    }
    /**
     * @param Integer[][] $isConnected
     * @return Integer
     */
    function findCircleNum($isConnected) {

        $this->countCities = count($isConnected);
        $this->result = 0;
        $this->visited = array_fill(0, $this->countCities, false);
        $this->isConnected = $isConnected;

        for($i = 0; $i < $this->countCities; $i++) {
            if(!$this->visited[$i]) {
                $this->foo($i);
                $this->result++;
            }
        }

        return $this->result;
    }
}

$isConnected = [[1,1,0],[1,1,0],[0,0,1]];

$solution = new Solution();

print_r($solution->findCircleNum( $isConnected ), false);
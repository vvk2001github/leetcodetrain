<?php

// 797. All Paths From Source to Target

// Given a directed acyclic graph (DAG) of n nodes labeled from 0 to n - 1, 
// find all possible paths from node 0 to node n - 1 and return them in any order.

// The graph is given as follows: graph[i] is a list of all nodes you can visit from node i 
// (i.e., there is a directed edge from node i to node graph[i][j]).


class Solution {

    private int $count_graph;
    private array $graph;
    private array $result;

    private function dfs(int $curNode = 0, array $curPath = []): void {
        
        $curPath[] = $curNode;

        if($curNode == $this->count_graph - 1) {
            $this->result[] = $curPath;
            return;
        }
        
        $countPathsFromCurNode = count($this->graph[$curNode]);
        for($i = 0; $i < $countPathsFromCurNode; $i++) {
            $this->dfs($this->graph[$curNode][$i], $curPath);
        }
    }

    /**
     * @param Integer[][] $graph
     * @return Integer[][]
     */
    function allPathsSourceTarget($graph) {
        $this->count_graph = count($graph);
        $this->graph = $graph;
        $this->result = [];
        $this->dfs();

        return $this->result;
    }
}

// $graph = [[1,2],[3],[3],[]];
$graph = [[4,3,1],[3,2,4],[3],[4],[]];

$solution = new Solution();

print_r($solution->allPathsSourceTarget( $graph ), false);

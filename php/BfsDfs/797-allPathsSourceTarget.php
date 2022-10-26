<?php

// 797. All Paths From Source to Target

// Given a directed acyclic graph (DAG) of n nodes labeled from 0 to n - 1, 
// find all possible paths from node 0 to node n - 1 and return them in any order.

// The graph is given as follows: graph[i] is a list of all nodes you can visit from node i 
// (i.e., there is a directed edge from node i to node graph[i][j]).


class Solution {

    private function dfs(): void {
        //
    }

    /**
     * @param Integer[][] $graph
     * @return Integer[][]
     */
    function allPathsSourceTarget($graph) {
        $count_graph = count($graph);
    }
}

$graph = [[1,2],[3],[3],[]];

$solution = new Solution();

print_r($solution->solve( $board ), false);

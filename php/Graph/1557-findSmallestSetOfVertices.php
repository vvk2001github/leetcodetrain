<?php

// 1557. Minimum Number of Vertices to Reach All Nodes

// Given a directed acyclic graph, 
// with n vertices numbered from 0 to n-1, 
// and an array edges where edges[i] = [fromi, toi] represents a directed edge from node fromi to node toi.

// Find the smallest set of vertices from which all nodes in the graph are reachable. 
// It's guaranteed that a unique solution exists.

// Notice that you can return the vertices in any order.


class Solution {

    /**
     * @param int $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findSmallestSetOfVertices($n, $edges) {
        $arr = array_fill(0, $n, 0);
        $countEdges = count($edges);

        for($i = 0; $i < $countEdges; $i++) {
            $arr[$edges[$i][1]] = 1;
        }

        return array_keys($arr, 0);
    }
}

$n = 6; $edges = [[0,1],[0,2],[2,5],[3,4],[4,2]];

$solution = new Solution();

print_r($solution->findSmallestSetOfVertices( $n, $edges ), false);
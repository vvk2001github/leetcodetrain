<?php

// 117. Populating Next Right Pointers in Each Node II

// Given a binary tree

// struct Node {
//   int val;
//   Node *left;
//   Node *right;
//   Node *next;
// }

// Populate each next pointer to point to its next right node. If there is no next right node, the next pointer should be set to NULL.

// Initially, all next pointers are set to NULL.

/**
 * Definition for a Node.
 * class Node {
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->left = null;
 *         $this->right = null;
 *         $this->next = null;
 *     }
 * }
 */

class Node {
    
    function __construct($val = 0) {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
        $this->next = null;
    }
}

class Solution {

    private function breadth_first(array $nodes = []): void {
        $count = count($nodes);

        if($count == 0) return;

        $newNodes = [];

        if($count == 1) {
            $nodes[0]->next = null;
            if($nodes[0]->left) $newNodes[] = $nodes[0]->left;
            if($nodes[0]->right) $newNodes[] = $nodes[0]->right;
            $this->breadth_first($newNodes);
        } else {
            for($i = 0; $i < ($count - 1); $i++) {
                if($nodes[$i]->left) $newNodes[] = $nodes[$i]->left;
                if($nodes[$i]->right) $newNodes[] = $nodes[$i]->right;
                $nodes[$i]->next = $nodes[$i + 1];
            }
            if($nodes[$count - 1]->left) $newNodes[] = $nodes[$count - 1]->left;
            if($nodes[$count - 1]->right) $newNodes[] = $nodes[$count - 1]->right;
            $nodes[$count - 1] = null;
            $this->breadth_first($newNodes);
        }
    }
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {

        if(!$root) return null;
        
        $this->breadth_first([$root]);

        return $root;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node7 = new Node(7);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;

$node3->right = $node7;



$solution = new Solution();

print_r($solution->connect( $node1 ), false);
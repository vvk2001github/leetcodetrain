<?php

// 116. Populating Next Right Pointers in Each Node

// You are given a perfect binary tree where all leaves are on the same level, and every parent has two children. 
// The binary tree has the following definition:

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

    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if($root->left) {
            $root->left->next = $root->right;
            $this->connect($root->left);
        }

        if($root->right) {
            $root->right->next = $root->next->left;
            $this->connect($root->right);
        }

        return $root;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);
$node4 = new Node(4);
$node5 = new Node(5);
$node6 = new Node(6);
$node7 = new Node(7);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;

$node3->left = $node6;
$node3->right = $node7;



$solution = new Solution();

print_r($solution->connect( $node1 ), false);
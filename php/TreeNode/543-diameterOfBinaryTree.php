<?php

// 543

// Given the root of a binary tree, return the length of the diameter of the tree.

// The diameter of a binary tree is the length of the longest path between any two nodes in a tree. This path may or may not pass through the root.

// The length of a path between two nodes is represented by the number of edges between them.

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}


class Solution {


    private int $dia = 0;

    private function diameter(TreeNode | null $node): int {
        if(is_null($node)) return 0;

        $left_d = $this->diameter($node->left);
        $right_d = $this->diameter($node->right);

        $this->dia = max($left_d + $right_d, $this->dia);

        return max($left_d, $right_d) + 1;
    }

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function diameterOfBinaryTree($root) {
        $this->dia = 0;
        $this->diameter($root);
        return $this->dia;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;

$solution = new Solution();

print_r($solution->diameterOfBinaryTree( $node1 ), false);

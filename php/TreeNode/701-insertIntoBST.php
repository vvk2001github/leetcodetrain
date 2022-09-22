<?php

// 701. Insert into a Binary Search Tree

// You are given the root node of a binary search tree (BST) and a value to insert into the tree. 
// Return the root node of the BST after the insertion. It is guaranteed that the new value does not exist in the original BST.

// Notice that there may exist multiple valid ways for the insertion, 
// as long as the tree remains a BST after insertion. You can return any of them.

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

    /**
     * @param TreeNode $root
     * @param Integer $val
     * @return TreeNode
     */
    function insertIntoBST($root, $val) {

        if(!$root) {
            return  new TreeNode($val);
        }

        $node = $root;
        $prev = null;
        while($node) {
            $prev = $node;
            if($val > $node->val) {
                $node = $node->right;
            } else {
                $node = $node->left;
            }
        }
        if($val > $prev->val) {
            $prev->right = new TreeNode($val);
        } else {
            $prev->left = new TreeNode($val);
        }

        return $root;
    }
}

$node1 = new TreeNode(1);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node7 = new TreeNode(7);
$node4->left = $node2;
$node4->right = $node7;
$node2->left = $node1;
$node2->right = $node3;

$val = 5;

$solution = new Solution();

print_r($solution->insertIntoBST( $node4, $val ), false);

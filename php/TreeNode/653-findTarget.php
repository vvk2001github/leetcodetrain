<?php

// 653. Two Sum IV - Input is a BST

// Given the root of a Binary Search Tree and a target number k, 
// return true if there exist two elements in the BST such that their sum is equal to the given target.

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

    private function treeToArray(TreeNode | null $node, array &$arr): void {
        if(!$node) return;
        if($node->left) $this->treeToArray($node->left, $arr);
        $arr[] = $node->val;
        if($node->right) $this->treeToArray($node->right, $arr);
    }

    /**
     * @param TreeNode $root
     * @param Integer $k
     * @return Boolean
     */
    function findTarget($root, $k) {
        $arr = [];
        $this->treeToArray($root, $arr);

        $count = count($arr);
        for($i = 0; $i < $count - 1; $i++) {
            // if($arr[$i] >= $k) return false;
            for($j = $i + 1; $j < $count; $j++) {
                // if($arr[$j] >= $k) return false;

                if($arr[$i] + $arr[$j] == $k) return true;
            }
        }
        return false;
    }
}

$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);
$node6 = new TreeNode(6);
$node7 = new TreeNode(7);

$node5->left = $node3;
$node5->right = $node6;

$node3->left = $node2;
$node3->right = $node4;

$node6->right = $node7;

$k = 9;

$solution = new Solution();

print_r($solution->findTarget( $node5, $k ), false);
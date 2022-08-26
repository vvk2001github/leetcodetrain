<?php
// 235

// Given a binary search tree (BST), find the lowest common ancestor (LCA) node of two given nodes in the BST.

// According to the definition of LCA on Wikipedia: 
// “The lowest common ancestor is defined between two nodes p and q as the lowest node in T that has both p and q as descendants 
// (where we allow a node to be a descendant of itself).”

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

    function depthTreeNode(TreeNode | null $root, TreeNode | null $node): int {
        if($root === null) return 0;
        if($node === null) return 0;
        if($node === $root) return 0;

        if($node->val < $root->val) return 1 + $this->depthTreeNode($root->left, $node);
        if($node->val > $root->val) return 1 + $this->depthTreeNode($root->right, $node);
    }

    function parentTreeNode(TreeNode | null $root, TreeNode | null $node): TreeNode | null {
        $result = null;
        while(($root !== $node) && ($root !== null)) {
            if(($root->left === $node ) || ($root->right === $node)) {
                $result = $root;
                break;
            }

            if($node->val < $root->val) { 
                $root = $root->left;
            } else {
                $root = $root->right;
            }
        }
        return $result;
    }

    /**
     * @param TreeNode $root
     * @param TreeNode $p
     * @param TreeNode $q
     * @return TreeNode
     */
    function lowestCommonAncestor($root, $p, $q) {
        $h1 = $this->depthTreeNode($root, $p);
        $h2 = $this->depthTreeNode($root, $q);

        while ($h1 != $h2) {
            if($h1 > $h2) {
                $p = $this->parentTreeNode($root, $p);
                $h1--;
            } else {
                $q = $this->parentTreeNode($root, $q);
                $h2--;
            }
        }

        while ($p !== $q) {
            $p = $this->parentTreeNode($root, $p);
            $q = $this->parentTreeNode($root, $q);
        }

        return $p;
    }
}

$node0 = new TreeNode(0);
$node2 = new TreeNode(2);
$node3 = new TreeNode(3);
$node4 = new TreeNode(4);
$node5 = new TreeNode(5);
$node6 = new TreeNode(6);
$node7 = new TreeNode(7);
$node8 = new TreeNode(8);
$node9 = new TreeNode(9);

$node6->left = $node2;
$node6->right = $node8;
$node2->left = $node0;
$node2->right = $node4;
$node8->left = $node7;
$node8->right = $node9;
$node4->left = $node3;
$node4->right = $node5;

$p = $node2;
$q = $node8;


$solution = new Solution();

//print_r($solution->parentTreeNode($node6, $node9), false);
print_r($solution->lowestCommonAncestor( $node6, $p, $q ), false);


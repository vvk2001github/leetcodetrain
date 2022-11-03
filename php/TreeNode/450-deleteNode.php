<?php

// 450. Delete Node in a BST

// Given a root node reference of a BST and a key, 
// delete the node with the given key in the BST. 
// Return the root node reference (possibly updated) of the BST.

// Basically, the deletion can be divided into two stages:

//     Search for a node to remove.
//     If the node is found, delete the node.


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

function treeFromArray2(array &$arr): ?TreeNode {

    $queue = new SplQueue();
    $pos = 0;
    $next = $arr[$pos++];
    $queue->enqueue(new TreeNode($next));
    $root = null;

    while(!$queue->isEmpty()) {
        $tree = $queue->dequeue();

        if(is_null($root)) {
            $root = $tree;
        }

        $next = $arr[$pos++] ?? null;

        if($next !== null){
            $tree->left = new TreeNode($next);
            $queue->enqueue($tree->left);
        } else {
            $tree->left = null;
        }
        
        $next = $arr[$pos++] ?? null;
        
        if($next !== null){
            $tree->right = new TreeNode($next);
            $queue->enqueue($tree->right);
        } else {
            $tree->right = null;
        }
    }

    return $root;
}

class Solution {

    private function minValue(?TreeNode $root): int {
        $minv = $root->val;
        while ($root->left !== null) {
            $minv = $root->left->val;
            $root = $root->left;
        }

        return $minv;
    }

    private function deleteRec(?TreeNode $root, int $key): ?TreeNode {
        if($root === null) {
            return $root;
        }

        if($key < $root->val) {
            $root->left = $this->deleteRec($root->left, $key);
        } elseif($key > $root->val) {
            $root->right = $this->deleteRec($root->right, $key);
        } else {
            // if key is same as root's  val

            // node with only one child or no child
            if($root->left === null) {
                return $root->right;
            } elseif($root->right === null ) {
                return $root->left;
            }

            // node with two children: Get the inorder
            // successor (smallest in the right subtree)
            $root->val = $this->minValue($root->right);
            $root->right = $this->deleteRec($root->right, $root->val);
        }

        return $root;
    }

    /**
     * @param TreeNode $root
     * @param int $key
     * @return TreeNode
     */
    function deleteNode($root, $key) {
        return $this->deleteRec($root, $key);
    }
}



$arr = [5,3,6,2,4,null,7]; $key = 3;
// $arr = [5,3,6,2,4,null,7,null, null, 9, 10]; $key = 3;

$root = treeFromArray2($arr);

// print_r( $root , false);

$solution = new Solution();

print_r($solution->deleteNode( $root, $key ), false);
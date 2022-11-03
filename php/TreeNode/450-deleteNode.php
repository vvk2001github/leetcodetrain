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

    private int $key;

    private function doit(?TreeNode $root = null, ?TreeNode $parent = null): void {
        if($root === null) {
            return;
        }

        if($this->key > $root->val) {
            $this->doit($root->right, $root);
        } elseif ($this->key < $root->val) {
            $this->doit($root->left, $root);
        } else {

            // Option 1
            if($root->left === null && $root->right === null) {
                if($parent->left === $root) {
                    $parent->left = null;
                }

                if($parent->right === $root) {
                    $parent->right = null;
                }

                return;
            }
            // 1


            // Option 2
            if($root->left === null || $root->right === null) {
                if($parent->left === $root) {
                    if($root->left === null) {
                        $parent->left = $root->right;
                        return;
                    }

                    if($root->right === null) {
                        $parent->left = $root->left;
                        return;
                    }
                }

                if($parent->right === $root) {
                    if($root->left === null) {
                        $parent->right = $root->right;
                        return;
                    }

                    if($root->right === null) {
                        $parent->left = $root->left;
                        return;
                    }
                }

                return;
            }
            // 2


            // Option 3
            if($root->left !== null && $root->right !== null) {
                //
            }
            // 3
        }
    } 

    /**
     * @param TreeNode $root
     * @param Integer $key
     * @return TreeNode
     */
    function deleteNode($root, $key) {
        $result = $root;
        $this->key = $key;

        $this->doit($root);

        return $result;
    }
}



$arr = [5,3,6,2,4,null,7]; $key = 6;

$root = treeFromArray2($arr);

// print_r( $root , false);

$solution = new Solution();

print_r($solution->deleteNode( $root, $key ), false);
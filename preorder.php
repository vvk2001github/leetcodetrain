<?php
// 589

// Given the root of an n-ary tree, return the preorder traversal of its nodes' values.

// Nary-Tree input serialization is represented in their level order traversal. 
// Each group of children is separated by the null value (See examples)
/**
 * Definition for a Node.
 * class Node {
 *     public $val = null;
 *     public $children = null;
 *     function __construct($val = 0) {
 *         $this->val = $val;
 *         $this->children = array();
 *     }
 * }
 */

class Node {
    public $val = null;
    public $children = null;
    function __construct($val = 0) {
        $this->val = $val;
        $this->children = array();
    }
}

class Solution {
    /**
     * @param Node $root
     * @return integer[]
     */
    private $result = array();

    function doit($root) {
        $this->result[]  = $root->val;
        foreach($root->children as $child) {
            $this->doit($child);
        }
    }

    function preorder($root) {

        

        $this->doit($root);

        return $this->result;
    }
}

// $root = [1,null,3,2,4,null,5,6];
$child5 = new Node(5);
$child6 = new Node(6);

$child3 = new Node(3);
$child3->children[] = $child5;
$child3->children[] = $child6;
$child2 = new Node(2);
$child4 = new Node(4);

$child1 = new Node(1);
$child1->children[] = $child3;
$child1->children[] = $child2;
$child1->children[] = $child4;
// $root = [1,null,2,3,4,5,null,null,6,7,null,8,null,9,10,null,null,11,null,12,null,13,null,null,14];

$solution = new Solution();

print_r($solution->preorder( $child1 ), false);
<?php
class Node
{
    public $val;
    public $left;
    public $right;

    public function __construct($data, $left, $right)
    {
        $this->val = $data;
        $this->left = $left;
        $this->left = $right;
    }
}
$node4 = new Node("4", null, null);
$node2 = new Node("2", null, null);
$node5 = new Node("5", null, null);
$node3 = new Node("3", null, null);

$node4->left = $node2;
$node4->right = $node5;
$node2->left = null;
$node2->right = $node3;

var_dump($node4);

$kth = kthSmallest($node4, 1);
var_dump($kth);

function kthSmallest($root, $k) {

    if (empty($root)) {
        return false;
    }

    $sortArr = rec($root);

    return $sortArr[$k-1];
}

function rec($node)
{
    static $arr = [];       // leetcode这里，不能用static，可以换成类属性，或者使用引用传进来

    if (!empty($node)) {
        rec($node->left);
        $arr[] = $node->val;
        rec($node->right);
    }

    return $arr;
}

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
$node7 = new Node("7", null, null);
$node1 = new Node("1", null, null);
$node3 = new Node("3", null, null);
$node6 = new Node("6", null, null);
$node9 = new Node("9", null, null);

$node4->left = $node2;
$node2->left = $node1;
$node2->right = $node3;
$node4->right = $node7;
$node7->left = $node6;
$node7->right = $node9;

$newNode = mirr($node4);
var_dump($newNode);

function mirr($root) {

    $list = [];
    array_push($list, $root);

    $result = [];

    while (!empty($list)) {
        $pop = array_shift($list);

        $tmp = $pop->left;
        $pop->left = $pop->right;
        $pop->right = $tmp;

        $result[] = $pop->val;

        if (!empty($pop->left)) {
            array_push($list, $pop->left);
        }

        if (!empty($pop->right)) {
            array_push($list, $pop->right);
        }
    }
var_dump($root);
    return $result;
}

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

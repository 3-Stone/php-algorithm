<?php
class Node
{
    public $val;
    public $left;

    public function __construct($data, $left, $right)
    {
        $this->val = $data;
        $this->left = $left;
        $this->right = $right;
    }
}

$node1 = new Node('1', null, null);
$node2 = new Node('2', null, null);
$node3 = new Node('2', null, null);
$node4 = new Node('3', null, null);
$node5 = new Node('4', null, null);
$node6 = new Node('4', null, null);
$node7 = new Node('3', null, null);

$node1->left = $node2;
$node1->right = $node3;

$node2->left = $node4;
$node2->right = $node5;

$node3->left = $node6;
$node3->right = $node7;


$a = getDeep($node1);

var_dump($a);

// 核心思想：广度遍历，一层一层来，把一层都放在一个新队列，再把这个队列，入队
function getDeep($root)
{

    if (empty($root)) {
        return 0;
    }

    $deep = 0;
    $list = [];
    array_push($list, [$root]);

    while (!empty($list)) {

        $tmpList = [];

        $pop = array_shift($list);

        for ($i = 0; $i < count($pop); $i++) {
            if (!empty($pop[$i]->left)) {
                array_push($tmpList, $pop[$i]->left);
            }
            if (!empty($pop[$i]->right)) {
                array_push($tmpList, $pop[$i]->right);
            }
        }

        $deep++;

        if (!empty($tmpList)) {
            array_push($list, $tmpList);
        }
    }

    return $deep;
}

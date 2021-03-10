<?php
class Node
{
    public $next = null;
    public $val = null;

    public function __construct($val)
    {
        $this->val = $val;
    }
}

$node1 = new Node(1);
$node2 = new Node(2);
$node3 = new Node(3);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = null;

reverse($node1);

function reverse($head)
{
    if (empty($head)) {
        return [];
    }

    $newList = null;

    while ($head != null) {
        $q = $head;
        $head = $head->next;
        $q->next = $newList;
        $newList = $q;
    }

    $arr = [];
    while ($newList != null) {
        $arr[] = $newList->val;
        $newList = $newList->next;
    }
return $arr;
    var_dump($arr);
}


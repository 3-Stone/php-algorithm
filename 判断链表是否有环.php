<?php
class Node
{
    public $data;
    public $next;

    public function __construct($data, $next)
    {
        $this->data = $data;
        $this->next = $next;
    }
}

$node1 = new Node('1', null);
$node2 = new Node('2', null);
$node3 = new Node('3', null);
$node4 = new Node('4', null);
$node5 = new Node('5', null);

$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node1;

print_r('<pre>');
print_r($node1);
print_r('</pre>');

$checkCycleRes = checkLinkListCycle($node1);

var_dump($checkCycleRes);

/**
 * 校验链表是否有环
 *  核心思想：
 *      增加快慢指针，慢指针一次移动一个元素，快指针一次移动两个元素
 *      如果有环，在某一时刻，两个指针一定能够相遇
 *      如果没有环，那么快指针肯定先遇到尾节点，结束
 *
 * @param $headNode
 * @return bool
 */
function checkLinkListCycle($headNode)
{
    $slow = $headNode->next;
    $fast = $headNode->next->next;

    while ($slow->next !== null && $fast->next !== null) {

        // 如果不理解这个感觉，这里注释打开，可以一步一步查看快慢指针的状态（也可以自己用笔画一个链表，用笔模拟快慢指针，会更好理解）
//        print_r('<pre>');
//        var_dump($slow, $fast);
//        print_r('</pre>');

        if ($slow === $fast) {
            return true;
        }

        $slow = $slow->next;
        $fast = $fast->next->next;
    }

    return false;
}
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

class SingleLinkList
{
    private $headNode;      // 头节点
    private $len;           // 节点数量

    public function __construct()
    {
        $this->init();
    }

    /**
     * 链表初始化（生成头结点、初始化链表长度）
     */
    private function init()
    {
        $this->headNode = new Node(null, null);
        $this->len = 0;
    }

    public function getHeadNode()
    {
        return $this->headNode;
    }

    /**
     * 插入节点
     *
     * @param $data
     * @param int $prevIndex 插入前一节点位置，0：插入头结点后，也就是第一个节点，1：第一个节点后（头结点的后一个的后一个）
     * @return bool
     */
    public function insert($data, $prevIndex = 0)
    {
        if (!is_integer($prevIndex) || $prevIndex < 0 || $prevIndex > $this->len) {
            return false;
        }

        $node = $this->getHeadNode();

        $i = 0;

        // 遍历链表，找到对应节点
        while ($node->next !== null) {
            if ($prevIndex === $i) {
                break;
            }

            $node = $node->next;
            $i++;
        }

        $newNode = new Node($data, $node->next);
        $node->next = $newNode;
        $this->len++;
        return true;
    }

    // ... 省略链表其他操作，详细请看“php实现单链表”

    public function reverseList()
    {

        // 先拿到整个链表
        $headNode = $this->getHeadNode();

        // 头结点赋值给$p
        $p = $headNode;
        // 链表中第一个元素赋值给$q
        $q = $headNode->next;

        // 让头结点变成尾节点（这里可以理解成另起了一个链表，且只有一个尾节点）
        $p->next = null;

        // 对原链表剩余节点进行迭代，不断的指向上面尾节点（也就是原链表中节点重新指向这个新链表）
        // Ps：可以理解成$p在另一个链表上，$q在原链表上，在迭代过程中，让$p不断前移，$q不断后移，直到$q没有后继节点，也就是到达表尾，翻转结束
        while ($q !== null) {
            $r = $q->next;      // 保留原链表的下一个节点，用于下次迭代使用
            $q->next = $p;      // 让原链表中的节点，指向新链表
            $p = $q;            // $p前移
            $q = $r;            // 选中下一个节点，准备下一次迭代
        }

        return $p;
    }
}

$singleLinkList = new SingleLinkList();

$singleLinkList->insert('123');
$singleLinkList->insert('456', 1);
$singleLinkList->insert('789', 2);

$reverseList = $singleLinkList->reverseList();

print_r('<pre>');
print_r($reverseList);
print_r('</pre>');
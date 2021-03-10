<?php
class CQueue {

    private $stack1 = [];       // 负责入
    private $stack2 = [];       // 负责出

    /**
     */
    function __construct() {

    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value) {
        array_push($this->stack1, $value);
    }

    /**
     * @return Integer
     */
    function deleteHead() {
        if (!empty($this->stack2)) {
            return array_pop($this->stack2);
        } else {
            while (!empty($this->stack1)) {
                $pop = array_pop($this->stack1);
                array_push($this->stack2, $pop);
            }
            if (empty($this->stack2)) {
                return -1;
            }
            $pop = array_pop($this->stack2);
            return $pop;
        }
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */
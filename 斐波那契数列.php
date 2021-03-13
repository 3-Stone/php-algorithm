<?php
echo fbnq(7);

// 核心逻辑： 斐波那契数列的解法，都是先定义2个初始值，也就是从哪2个起点开始，然后就是迭代相加的过程了
function fbnq($n) {

    if ($n <= 1) {
        return $n;
    }

    $pre = 0;
    $next = 1;

    for ($i=2; $i<= $n; $i++) {
        $tmp = $next;
        $next = $pre + $next;
        $pre = $tmp;
    }

    return $next;
}
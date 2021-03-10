<?php
echo fbnq(6);

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
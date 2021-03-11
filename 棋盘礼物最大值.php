<?php
$gift = [
    [1,3,1],
    [1,5,1],
    [4,2,1],
];

// 通过算法演变后
//$giftNew = [
//    [1,4,5],
//    [2,9,10],
//    [6,11,12]
//];

$max = calMaxGift($gift);
var_dump($max);

function calMaxGift($gift)
{

    // 核心思想：把棋盘每一个的位置的最大值计算出来即可

    // 横向用i标识
    // 纵向用j标识

    $rows = count($gift[0]);
    $cols = count($gift);

    if ($rows <= 0) {
        return false;
    }

    if ($cols <= 0) {
        return false;
    }

    for ($i = 0; $i < $rows; $i++) {
        if ($i == 0) {
            $gift[0][$i] = $gift[0][0];
        } else {
            $gift[0][$i] += $gift[0][$i - 1];
        }
    }

    for ($j = 0; $j < $cols; $j++) {
        if ($j == 0) {
            $gift[$j][0] = $gift[0][0];
        } else {
            $gift[$j][0] += $gift[$j - 1][0];
        }
    }

    if ($rows >= 1 && $cols >= 1) {

        for ($i = 1; $i < $rows; $i++) {
            for ($j = 1; $j < $cols; $j++) {
                $gift[$j][$i] = max($gift[$j - 1][$i], $gift[$j][$i - 1]) + $gift[$j][$i];
            }
        }
    }

    return $gift[$cols - 1][$rows - 1];
}
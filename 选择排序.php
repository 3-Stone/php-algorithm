<?php

/**
 *
 * 时间复杂度：O(n^2)
 *
 * 步骤：
 *  1、在未排序序列中找到最小（大）元素，存放到已排序序列的起始位置
 *  2、在剩余未排序元素中继续寻找最小（大）元素，然后放到已排序序列的末尾
 *  3、重复第2个步骤，直到全部排序完成
 *
 */

$arr = [4, 8, 2, 4, 5, 7, 9, 0];

selectionSort($arr);

var_dump($arr);

function selectionSort(&$arr)
{
    $arrLen = count($arr);

    for ($i = 0; $i < $arrLen - 1; $i++) {

        $currIndex = $i;

        for ($j = $i + 1; $j < $arrLen; $j++) {

            // 如果是倒序，这里就是大于
            if ($arr[$j] < $arr[$currIndex]) {
                $currIndex = $j;
            }
        }

        list($arr[$i], $arr[$currIndex]) = [$arr[$currIndex], $arr[$i]];
    }
}
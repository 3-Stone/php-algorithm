<?php
/**
 *
 * 输入：“abcabcbb”
 * 输出：3
 * 解释: 因为无重复字符的最长子串是 "abc"，所以其长度为 3。
 *
 * 输入：“pwwkew”
 * 输出：3
 * 解释: 因为无重复字符的最长子串是 "wke"，所以其长度为 3，而不是 "pwke"，"pwke" 是一个子序列，不是子串。
 *
 */

$str = 'abcabcbb';

$tmpStr = '';

$maxLen = 0;

// 遍历所有字符（下面使用mb_系列函数，是为了支持中文）
for ($i = 0; $i <= mb_strlen($str) - 1; $i++) {

    // 取出当前字符
    $char = mb_substr($str, $i, 1);

    // 判断是否重复
    $existPos = mb_strpos($tmpStr, $char);

    // 如果有重复，就舍弃之前的字符串，重新计算长度
    if ($existPos !== false) {
        // 这里有两个方法，都可以舍弃之前的字符串
//        $tmpStr .= $char;
//        $tmpStr = mb_substr($tmpStr, $existPos + 1);
        $tmpStr = $char;
    } else {
        $tmpStr .= $char;
    }

    // 每一次遍历后，都与上一次的长度做对比，谁更大取谁
    $maxLen = mb_strlen($tmpStr) > $maxLen ? mb_strlen($tmpStr) : $maxLen;
}

echo "无重复字符串最长子串长度：" . $maxLen;

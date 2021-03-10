<?php
$prices = [7, 1, 5, 3, 6, 4];

echo gupiao($prices);

function gupiao($prices)
{
    if (empty($prices) || count($prices) == 1) {
        return 0;
    }

    $max_profit = 0;        // 最大获利金额
    $min_price = 0;         // 当前最小价格（寻找股价最低价格）

    for ($i = 0; $i < count($prices); $i++) {
        if ($i == 0) {
            $min_price = $prices[$i];
        }

        $max_profit = max($prices[$i] - $min_price, $max_profit);

        $min_price = min($min_price, $prices[$i]);
    }

    return $max_profit;
}
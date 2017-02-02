<?php
/**
 * Created by PhpStorm.
 * User: Derkien
 * Date: 23.09.2016
 * Time: 1:18
 */
$task = <<<TASK
Если мы возьмем 47, перевернем его и сложим, получится 47 + 74 = 121 — число-палиндром.

Если взять 349 и проделать над ним эту операцию три раза, то тоже получится палиндром:
349 + 943 = 1292
1292 + 2921 = 4213
4213 + 3124 = 7337

Найдите количество положительных натуральных чисел меньших 13702  таких,
что из них нельзя получить палиндром за 50 или менее применений описанной операции (операция должна быть применена хотя бы один раз).
TASK;
$answer = 0;
$a = 13702;
$pals = [];
for ($b = 1; $b < $a; $b++) {
    $n = 0;
    $x = canPal($b, $n);
    if (!$x) {
        $answer++;
    } else {
        $pals[$b] = $n;
    }
}
function canPal($str, &$n)
{
    static $opCount = 0;
    $inverse = strrev($str);
    $res = (int)$str + (int)$inverse;
    $opCount++;
    // если палиндром
    $isPal = ifPal($res);
    // если операций более 0
    if ($opCount <= 50) {
        if ($isPal) {
            $n = $opCount;
            $opCount = 0;
            return true;
        } else {
            // пробуем еще разок
            return canPal($res, $n);
        }
    }
    $opCount = 0;
    return false;
}
function ifPal($str)
{
    $b = $str;
    $c = 0;
    do {
        $c = $c * 10 + ($b % 10);
        $b = (int) ($b / 10);
    } while ($b > 0);
    if ($c == $str) {
        return true;
    } else {
        return false;
    }
}
echo 'The answer is: '. $answer;
<?php
/**
 * Created by PhpStorm.
 * User: Derkien
 * Date: 25.09.2016
 * Time: 22:18
 */
$task = <<<TASK
Число 125874 и результат умножения его на 2 — 251748 можно получить друг из друга перестановкой цифр. 

Найдите наименьшее положительное натуральное x такое, что числа 2*x, 6*x можно получить друг из друга перестановкой цифр. 
TASK;
$answer = 0;
$mult1 = 2;
$mult2 = 6;
for ($answer = 1; ; $answer++) {
    $splX3 = str_split($answer * $mult1);
    $splX4 = str_split($answer * $mult2);
    sort($splX3);
    sort($splX4);
    if ($splX3 == $splX4) {
        break;
    }
}
echo 'The answer is: '. $answer;

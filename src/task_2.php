<?php
/**
 * Created by PhpStorm.
 * User: Derkien
 * Date: 23.09.2016
 * Time: 1:27
 */
$task = <<<TASK
Рассмотрим все возможные числа a^b для 1<a<6 и 1<b<6: 
2^2=4, 2^3=8, 2^4=16, 2^5=32 3^2=9, 3^3=27, 3^4=81, 3^5=243 4^2=16, 4^3=64, 4^4=256, 4^5=1024, 5^2=25, 5^3=125, 5^4=625, 5^5=3125 
Если убрать повторения, то получим 15 различных чисел.

Сколько различных чисел a^b для 2<a<135 и 2<b<116? 
TASK;
$answer = 0;
$startA = 2;
$startB = 2;
$endA = 135;
$endB = 116;
//// for test
//$startA = 1;
//$startB = 1;
//$endA = 6;
//$endB = 6;
$pow = [];
for ($a = $startA; $a < $endA; $a++) {
    for ($b = $startB; $b < $endB; $b++) {
        $pow[] = $a ** $b;
    }
}
$answer = count(array_unique($pow));
echo 'The answer is: '. $answer;

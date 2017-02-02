<?php
/**
 * Created by PhpStorm.
 * User: Derkien
 * Date: 23.09.2016
 * Time: 1:45
 */
$task = <<<TASK
В некоторых числах можно найти последовательности цифр, которые в сумме дают 10. К примеру, в числе 3523014 целых четыре таких последовательности:
(352)3014
3(523)014
3(5230)14
35(23014)

Можно найти и такие замечательные числа, каждая цифра которых входит в по крайней мере одну такую последовательность.
Например, 3523014 является замечательным числом, а 28546 — нет (в нём нет последовательности цифр, дающей в сумме 10 и при этом включающей 5). 

Найдите количество этих замечательных чисел в интервале [1, 1200000] (обе границы — включительно). 
TASK;
$answer = 0;
// теперь определим числа
$startFrom = 1;
$end = 1200000;
//// for test
//$startFrom = 3523014;
//$end = 3523014;
//todo поработать над скоростью
for ($i = $startFrom; $i <= $end; $i++) {
    // все числа строки
    $nums = str_split($i);
    // уникальные числа строки
    $uniqueNumbs = array_unique($nums);
    $countUnique= count($uniqueNumbs);
    //число состоит из двух уникальных чисел и их сумма равна 10
    if($countUnique == 2 && array_sum($uniqueNumbs) == 10){
        $answer++;
        continue;
    }
    // все числа последовательностей
    $seqSumNumbers = [];
    // длина чисила
    $len = strlen($i);
    // составить все возможные последовательности чисел
    for ($a = 0; $a < $len; $a++) {
        // c i символа и до конца строки
        for ($j = $len - $a; $j - 1 > 0; $j--) {
            $subSeqNums = str_split(substr($i, $a, $j));
            // если сумма 10
            if (array_sum($subSeqNums) == 10) {
                $seqSumNumbers = array_merge($seqSumNumbers, $subSeqNums);
            }
        }
    }
    //в числах последовательности содержатся все уникальные числа строки, то ок
    if (count(array_diff($uniqueNumbs, $seqSumNumbers)) == 0) {
        $answer++;
    }
}
echo 'The answer is: '. $answer;
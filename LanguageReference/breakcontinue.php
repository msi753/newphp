<?php

/**
 * break [level]
 */
$i = 0;
for($i=0; $i<10; $i++) {
    break;
}
echo $i;    //0

for($i=0; $i<10; $i++) {
    for($j=0; $j<10; $j++) {
        break 2;
    }
    echo $i;
}
//밖의 for문까지 break한다.

/**
 * continue [level]
 */
$i=0;
for($i=0; $i<10; $i++) {    
    continue;
}
echo $i;    //10

$sum = 0;
for($i=0; $i<10; $i++) {
    for($j=0; $j<10; $j++) {
        continue;
    }
    $sum += $i;
}
echo $sum;  //45

$sum = 0;
for($i=0; $i<10; $i++) {
    for($j=0; $j<10; $j++) {
        continue 2;
    }
    $sum += $i;
}
echo $sum;  //0
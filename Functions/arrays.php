<?php

$blog = [
    'title' => 'Lorem Ipsum',
    'categories' => [
        'all' => [
            'title' => 'what is Lorem Ipsum?',
            'content' => 'Nulla est nostrud nisi culpa adipisicing dolore enim commodo eu elit.'
        ],
        [
            'title' => 'why do we use it?',
            'content' => 'Occaecat qui enim excepteur voluptate aute non cupidatat.'
        ],
        [
            'title' => 'where does it come from?',
            'content' => 'Do culpa deserunt consectetur non ex eiusmod consequat deserunt.'
        ],
    ],
];
//add
array_push($blog['categories']['all'], [
    'title' => 'Aliquip dolore incididunt dolor do.',
    'content' => 'Id ipsum dolor proident officia id officia labore.'
]);
var_dump($blog['categories']['all']);

//delete
array_pop($blog['categories']['all']);

//filtering
var_dump(array_filter($blog['categories']['all'], function($post) {
    return $post['title'] == 'what is Lorem Ipsum?';
}));

$numbers = [1,2,3,4,5];
//key
array_key_exists('title', $blog);  //1
array_keys($numbers);

//value
array_values($numbers);

//다른 배열로 새로운 배열 만들기
//원본에는 변화 없음
array_map(function($post) {
    return $post['title'];
}, $blog['categories']['all']);


array_search('Lorem Ipsum', $blog);    //title
in_array(3, $numbers);  //true


range(1,5);


//$carry는 null부터 시작, $num은 1부터 시작해서 1씩 증가
array_reduce($numbers, function($carry, $num) {
    var_dump($carry, $num);
    return $carry += $num *2;   //30
});


//알아서 매핑해줌
$message = 'Hello';
$userCount = 0;
$pi = 3.14;
$is_visited = true;
$temp = null;
compact('message', 'userCount', 'pi', 'is_visited', 'temp');
// array(5) {
//     'message' =>
//     string(5) "Hello"
//     'userCount' =>
//     int(0)
//     'pi' =>
//     double(3.14)
//     'is_visited' =>
//     bool(true)
//     'temp' =>
//     NULL
//   }


$numbers = range(1,5);
rsort($numbers);    //배열 원본이 변함

$arr = [
    'r' => 'bye',
    'c' => 'who are',
    'a' => 'hello'
];

arsort($arr);   //값 기준 정렬, 원본 변화

ksort($arr);    //키 기준 정렬, 원본 변화

usort($numbers, function($a, $b) {  //숫자
    return $a>$b;   //오름차순
});

uasort($arr, function($a, $b) { //배열 값 기준
    return $a>$b;   //오름차순
});

uksort($arr, function($a, $b) { //배열 키 기준
    return $a>$b;   //오름차순
});
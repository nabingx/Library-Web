<?php

$connect = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password =13062001");
$pg_cmd = "SELECT * FROM \"Category\"";
$pg_execute = pg_query($connect, $pg_cmd);


$arr = [];

while($row = pg_fetch_array($pg_execute)){
    $bookName = $row['Category_Name'];
    $arr[] = $bookName;
}

$bad_words = [
    'ngu',
    'nguu',
    'nguuu',
    'nguuuu',
    'nguuuuu',
    'nguvl',
    'vcl',
    'nguvcl',
    'occho',
    'loz',
    'dit',
    'ditme',
    'sna'
];


$value = trim($_GET['value']);


if (!$value)
    $suggestions = [];
else {
    $suggestions = [];

    foreach ($arr as $ai) {
        $s = substr($ai, 0, strlen($value));
        if ($s == $value) $suggestions[] = $ai;
    }
    
    foreach ($bad_words as $bad_wordi) {
        if ($value == $bad_wordi) {
            unset($suggestions);
            $suggestions[] = 'BAD WORD!';
        }
    }
}

$ret = new stdClass();
$ret->suggestions = $suggestions;

print(json_encode($ret));


?>
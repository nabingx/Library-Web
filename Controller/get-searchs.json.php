<?php

include '../database/connect.php';
$pg_cmd = "SELECT * FROM \"Library\"";
$pg_execute = pg_query($connect, $pg_cmd);

while($row = pg_fetch_array($pg_execute)){
    $bookName = $row['BookName'];
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
    'sna',
    'ngu vl',
    'ngu ia'
];


$value = trim($_GET['value']);


if (!$value)
    $suggestions = [];
else {
    $suggestions = [];
    
    foreach ($arr as $ai) {
        $s = substr($ai, 0, strlen($value));
        if (strtolower($s) == strtolower($value)) $suggestions[] = $ai;
    }

    foreach ($bad_words as $bad_wordi) {
        if (strtolower($value) == strtolower($bad_wordi)) {
            unset($suggestions);
            $suggestions[] = 'BAD WORD!';
        }
    }
}

$ret = new stdClass();
$ret->suggestions = $suggestions;

print(json_encode($ret));

?>
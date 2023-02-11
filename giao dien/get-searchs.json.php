<?php

$connect = pg_connect("host=localhost port=5432 dbname=OnlineLibrary user=postgres password =12345678");
$pg_cmd = "SELECT * FROM \"Library\"";
$pg_execute = pg_query($connect, $pg_cmd);


$arr = [
    // 'dog',
    // 'cow',
    // 'cat',
    // 'horse',
    // 'donkey',
    // 'tiger',
    // 'lion',
    // 'panther',
    // 'leopard',
    // 'cheetah',
    // 'bear',
    // 'elephant',
    // 'polar',
    // 'bear',
    // 'turtle',
    // 'tortoise',
    // 'crocodile',
    // 'rabbit',
    // 'porcupine',
    // 'hare',
    // 'hen',
    // 'pigeon',
    // 'albatross',
    // 'crow',
    // 'fish',
    // 'dolphin',
    // 'frog',
    // 'whale',
    // 'alligator',
    // 'eagle',
    // 'flying',
    // 'squirrel',
    // 'ostrich',
    // 'fox',
    // 'goat',
    // 'jackal',
    // 'emu',
    // 'armadillo',
    // 'eel',
    // 'goose',
    // 'arctic',
    // 'fox',
    // 'wolf',
    // 'beagle',
    // 'gorilla',
    // 'chimpanzee',
    // 'monkey',
    // 'beaver',
    // 'orangutan',
    // 'antelope',
    // 'bat',
    // 'badger',
    // 'giraffe',
    // 'hermit',
    // 'crab',
    // 'giant panda',
    // 'hamster',
    // 'cobra',
    // 'hammerhead',
    // 'shark',
    // 'camel',
    // 'hawk',
    // 'deer',
    // 'chameleon',
    // 'hippopotamus',
    // 'jaguar',
    // 'chihuahua',
    // 'king',
    // 'cobra',
    // 'ibex',
    // 'lizard',
    // 'koala',
    // 'kangaroo',
    // 'iguana',
    // 'llama',
    // 'chinchillas',
    // 'dodo',
    // 'jellyfish',
    // 'rhinoceros',
    // 'hedgehog',
    // 'zebra',
    // 'possum',
    // 'wombat',
    // 'bison',
    // 'bull',
    // 'buffalo',
    // 'sheep',
    // 'meerkat',
    // 'mouse',
    // 'otter',
    // 'sloth',
    // 'owl',
    // 'vulture',
    // 'flamingo',
    // 'racoon',
    // 'mole',
    // 'duck',
    // 'swan',
    // 'lynx',
    // 'monitor',
    // 'lizard',
    // 'elk',
    // 'boar',
    // 'lemur',
    // 'mule',
    // 'baboon',
    // 'mammoth',
    // 'blue',
    // 'whale',
    // 'rat',
    // 'snake',
    // 'peacock'
];

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
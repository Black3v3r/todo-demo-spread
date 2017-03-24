<?php

require_once 'error_handling.php';

require_once 'vendor/autoload.php';

$dbConfig = array();
require_once 'db_config.inc.php';

require_once 'Database.php';

$twigLoader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twigEnv = new Twig_Environment($twigLoader, [
//     'cache' => __DIR__ . './tmp',
    'cache' => false,
    'debug' => true
]);

$db = new Database($dbConfig);

$items = $db->get('items');

echo $twigEnv->render('index.twig', ['items' => $items]);

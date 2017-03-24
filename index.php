<?php

require_once 'error_handling.php';

require_once 'vendor/autoload.php';

$dbConfig = array();
require_once 'db_config.inc.php';

$twigLoader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twigEnv = new Twig_Environment($twigLoader, [
//     'cache' => __DIR__ . './tmp',
    'cache' => false,
    'debug' => true
]);

function items($dbConfig)
{
    $pdo = new PDO('mysql:dbname=' . $dbConfig['dbname'] . ';host=' . $dbConfig['host'], $dbConfig['username'], $dbConfig['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $items = $pdo->query('SELECT * FROM todolist.items');
    return $items;
}

echo $twigEnv->render('index.twig', ['items' => items($dbConfig)]);

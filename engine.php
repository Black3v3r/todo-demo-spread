<?php

require_once 'error_handling.php';

require_once 'db_config.inc.php';
require_once 'Database.php';

if (isset($_POST)) {
    var_dump($_POST);
    var_dump($dbConfig);
    $db = new Database($dbConfig);

//    $db->connect();

    $db->insert('items', [
        'title' => htmlspecialchars($_POST['title'])
    ]);

    echo "lol";
}

//header('Location: ./');
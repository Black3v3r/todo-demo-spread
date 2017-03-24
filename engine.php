<?php

require_once 'error_handling.php';

require_once 'db_config.inc.php';
require_once 'Database.php';

if (isset($_POST) && isset($_POST['item-title'])) {
    $db = new Database($dbConfig);
    $db->insert('items', [
        'title' => htmlspecialchars($_POST['item-title'])
    ]);
}

header('Location: ./');
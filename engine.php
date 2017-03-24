<?php

require_once 'error_handling.php';

require_once 'db_config.inc.php';
require_once 'Database.php';

var_dump($_POST);

if (isset($_GET['action']) && ($_GET['action'] == 'add') && isset($_POST['item-title']))
{
    $db = new Database($dbConfig);
    $db->insert('items', [
        'title' => htmlspecialchars($_POST['item-title'])
    ]);
}

elseif (isset($_GET['action']) && ($_GET['action'] == 'delete'))
{
    var_dump($_POST);
}

//header('Location: ./');
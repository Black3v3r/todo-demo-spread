<?php

require_once 'error_handling.php';

require_once 'db_config.inc.php';
require_once 'Database.php';

/* Database instantiation */
$db = new Database($dbConfig);

/* Item insertion */
if (isset($_GET['action']) && ($_GET['action'] == 'add') && isset($_POST['item-title'])) {
    $db->insert('items', [
        'title' => htmlspecialchars($_POST['item-title'])
    ]);
}
/* Item deletion */
elseif (isset($_GET['action']) && ($_GET['action'] == 'delete')) {
    /* Delete all items if header's checkbox was checked */
    if (isset($_POST['checkbox-item-all']) && $_POST['checkbox-item-all'] == 'on') {
        $db->deleteAll('items');
    }
    /* If only one or several items were checked, or if a "Delete" button was pressed */
    else {
        /* Iterate over POST elements to see if there are elements to delete */
        foreach ($_POST as $k => $v) {
            /* Delete when checkbox selected */
            if ($v == 'on') {
                /* $k has this format: 'checkbox-item-#' so we get the id */
                preg_match('/checkbox-item-([0-9]+)$/', $k, $matches);

                if (isset($matches[1])) {
                    $db->deleteById('items', $matches[1]);
                }
            }

            /* Delete when button pressed */
            if ($v == 'Delete') {
                /* $k has this format: 'button-delete-item-#' so we get the id */
                preg_match('/button-delete-item-([0-9]+)$/', $k, $matches);

                if (isset($matches[1])) {
                    $db->deleteById('items', $matches[1]);
                }
            }
        }
    }

}

header('Location: ./');
<?php
    
    define("PRIVATE_PATH", dirname(__FILE__)); // /app/private
    define("PROJECT_PATH", dirname(PRIVATE_PATH)); // /app
    define("PUBLIC_PATH", PROJECT_PATH . "/public");
    define("SHARED_PATH", PRIVATE_PATH . "/shared");
    // Assign the root URL to a PHP constant
    // * Do not need to include the domain
    // * Use same document root as webserver
    // * Can set a hardcoded value:
    // define("WWW_ROOT", '/~kevinskoglund/globe_bank/public');
    // define("WWW_ROOT", '');
    // * Can dynamically find everything in URL up to "/public"
    $public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
    $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
    define("WWW_ROOT", $doc_root);

    $subjects = [
        ['id' => '1', 'position' => '1', 'visible' => '1', 'menu_name' => 'About Globe Bank'],
        ['id' => '2', 'position' => '2', 'visible' => '1', 'menu_name' => 'Consumer'],
        ['id' => '3', 'position' => '3', 'visible' => '1', 'menu_name' => 'Small Business'],
        ['id' => '4', 'position' => '4', 'visible' => '1', 'menu_name' => 'Commercial'],
    ];
    $pages = [
        ['id' => '1', 'position' => '1', 'visible' => '1', 'page_name' => 'Globe Bank'],
        ['id' => '2', 'position' => '2', 'visible' => '1', 'page_name' => 'History'],
        ['id' => '3', 'position' => '3', 'visible' => '1', 'page_name' => 'Leadership'],
        ['id' => '4', 'position' => '4', 'visible' => '1', 'page_name' => 'Contact Us'],
    ];
    
    require_once("functions.php");
    require_once("database.php");
    require_once("query_functions.php");
    require_once('validations_functions.php');

    $db = db_connected();

?>
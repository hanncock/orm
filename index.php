<?php

    declare(strict_types=1);

    spl_autoload_register(function ($class){
        
        require __DIR__ . "/$class.php";
    
    });

    set_error_handler("ErrorHandler::handleError");

    set_exception_handler("ErrorHandler::handleException");

    header("Content-type: application/json; charset=UTF-8");

    $parts = explode("api", $_SERVER["REQUEST_URI"]);

    $database = new Database("localhost", "product_db", "soke", "");

    $gateway = new Executor($database);

    $student = new Student();
    $tblName = $student->classTableName();

    $controll = new Controller($gateway);
    $controll->processRequest($_SERVER["REQUEST_METHOD"],$tblName,$parts);
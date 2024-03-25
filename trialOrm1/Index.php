<?php
    declare(strict_types=1);

    echo "this is the file";

    spl_autoload_register(function ($class){

        require __DIR__ . "/$class.php";

    });

    $users = new TestModel();
    $users = $users->findAll();    
?>
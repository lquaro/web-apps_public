<?php
$db = new PDO('sqlite:tasks.sqlite');

spl_autoload_register(function ($class) {
    $path = __DIR__ . "/models.php";
});
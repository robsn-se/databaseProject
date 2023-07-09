<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
const DB_HOST = "localhost";
const DB_USER = "ruben";
const DB_PASSWORD = "ser-1988";
const DB_NAME = "database_project";
try {
    $connect = mysqli_connect(
        DB_HOST,
        DB_USER,
        DB_PASSWORD,
        DB_NAME
    );
    if (!$connect) {
       throw new Exception("Ошибка подключения: " . mysqli_connect_error());
    }

    if(isset($_POST['submit'])) {
        if(isset($_POST["name"]) && isset($_POST["age"])) {
            $query = "INSERT INTO `users`(`name`, `age`) VALUES ('{$_POST["name"]}', '{$_POST["age"]}')";
            if(mysqli_query($connect, $query))
            {
                echo "Post added!";
            }
        }
    }
    if (isset($_POST["id"])) {
        $userid = mysqli_real_escape_string($connect, $_POST["id"]);
        $sql = "DELETE FROM `users` WHERE `id` = '$userid'";
        if(mysqli_query($connect, $sql)){
            header("Location: index.php");
        }
    }
}
catch (\Exception $e) {
    print_r("{$e->getMessage()} | {$e->getFile()}({$e->getLine()}) \n{$e->getTraceAsString()} \n\n");
}

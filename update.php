<?php
require_once "db.php";

if(isset($_GET["id"])) {
    $selectDataUpdate = mysqli_query($connect, "SELECT * FROM `users` WHERE `id` = '{$_GET["id"]}'");
            foreach($selectDataUpdate as $row){
                $userName = $row["name"];
                $userAge = $row["age"];
            }
            echo "<h3>Обновление пользователя</h3>
                <form method='post'>
                    <input type='hidden' name='id' value='{$_GET["id"]}' />
                    
                    <p>Имя:
                    <input type='text' name='name' value='$userName' /></p>
                    <p>Возраст:
                    <input type='number' name='age' value='$userAge' /></p>
                    <input type='submit'  value='Сохранить'>
            </form>";
}
if (isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["age"])) {
    if ($result = mysqli_query($connect, "UPDATE `users` SET `name` = '{$_POST["name"]}', `age` = '{$_POST["age"]}' WHERE id = '{$_POST["id"]}'")) {
        header("Location: index.php?note=Post+{$_POST["id"]}+update!");
    } else {
        echo "Ошибка: " . mysqli_error($connect);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <a href="index.php"><button class="main_page" type="submit" name="submit">Main page</button></a>
</body>
</html>

<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
<h5><?= @$_GET["note"] ?></h5>
<form class="form" action="" method="post">
    <label class="input_label"><span class="input_title">Name</span>
        <input class="input" type="text" name="name" required="">
    </label>
    <label class="input_label"><span class="input_title">Age</span>
        <input class="input" type="text" name="age" required="">
    </label>
    <button class="button button_orange" type="submit" name="submit">Save</button>
</form>
<div class="date" >
    <table class="list">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
<?php
$selectData = mysqli_query($connect, "SELECT * FROM `users`");
foreach($selectData as $data){ ?>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['name'] ?></td>
            <td><?= $data['age'] ?></td>
            <td>
                <form action="" method='post'>
                    <input type='hidden' name='id' value='<?= $data['id'] ?>'>
                    <button type="submit" name="delete">Deleted</button>
                </form>
            </td>
            <td>
                <form action='update.php?id=<?= $data['id'] ?>' method='post'>
                    <input type='hidden' name='edit' value='<?= $data['id'] ?>'>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
<?php }  ?>
    </table>
</div>
</body>

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
            <th>Nme</th>
            <th>Age</th>
            <th>Note</th>

        </tr>
<?php
$selectData = mysqli_query($connect, "SELECT `name`, `age` FROM `users`");
while($data = mysqli_fetch_assoc($selectData)) { ?>
        <tr>
            <td><?= $data['name'] ?></td>
            <td><?= $data['age'] ?></td>
            <td>
                <form action='db.php' method='post'>
                    <input type='hidden' name='id' >
                    <input type='submit' value='delete'>
                </form>
            </td>
        </tr>
<?php }  ?>
    </table>
</div>
</body>

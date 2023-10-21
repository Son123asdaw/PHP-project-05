<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location: /login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="logout.php">Logout</a>
    <a href="personinfor.php">User Information</a>
    <h1>HELLO <?php echo $_SESSION['email']; ?></h1>
</body>

</html>
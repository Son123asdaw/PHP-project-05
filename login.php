<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['email'] = $_POST['email'];
        header('location: /index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST" action="<?php htmlentities($_SERVER['PHP_SELF']) ?>" class="edit-form">
        <div class="input">
            <label>Email : </label>
            <input  type="email" name="email" >
        </div> <br>
        <div class="input">
            <label>Password : </label>
            <input  type="password" name="password" >
        </div> <br> 
        <button>Login</button>
    </form>
   
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$errors = [];
$email = null;
$password = null;
$number = null;
$date = null;
$fullName = null;
$confirmPass = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['fullName'])) {
        $errors['fullName'] = 'Vui lòng nhập họ và tên!';
    } else {
        $email = $_POST['fullName'];
    }
    if (empty($_POST['date'])) {
        $errors['date'] = 'Vui lòng nhập ngày tháng năm sinh!';
    } else {
        $email = $_POST['date'];
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Vui lòng nhập email!';
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Vui lòng nhập mật khẩu!';
    } else {
        $password = $_POST['password'];
    }
    if (empty($_POST['confirmPass'])) {
        $errors['confirmPass'] = 'Vui lòng nhập lại mật khẩu!';
    } else {
        $confirmPass = $_POST['confirmPass'];
    }
    if ($password != $_POST['confirmPass']) {
        $errors['confirmPass'] = 'Mật khẩu không trùng khớp!';
    } else {
        $confirmPass = $_POST['confirmPass'];
    }
    if (empty($_POST['number'])) {
        $errors['number'] = 'Vui lòng nhập số điện thoại!';
    } else {
        $email = $_POST['number'];
    }
}

function getErrorsMessage($key, $errors)
{
    if (array_key_exists($key, $errors)) {
        return $errors[$key];
    } else {
        return '';
    }
}
?>

<body>
    <!-- <div>
        <h1>data input</h1>
        <ul>
            <li>Fullname: <?php echo $fullName; ?></li>
            <li>Date: <?php echo $date; ?></li>
            <li>Email: <?php echo $email; ?></li>
            <li>Password: <?php echo $password; ?></li>
            <li>Number: <?php echo $number; ?></li>
            <li>Date: <?php echo $date; ?></li>
        </ul>
    </div> -->
    <style>
        body {
            
            background-color: #FCFCFD;
        }
    </style>

    <form method='POST' action='<?php htmlentities($_SERVER['PHP_SELF']) ?>'>
        <h1>SIGN UPppppp</h1>
        <div class="edit-form">
            <div class="input">
                <label>First &last name : </label><br>
                <input id="input-type" name='fullName' type='fullName' placeholder='Firt & Last Name'>
                <p style="color:red;"><?php echo getErrorsMessage('fullName', $errors) ?></p>
            </div> <br>
            <div>
                <label>Date of birth : </label><br>
                <input id="input-type" name='date' type='date' placeholder='Your birth day'>
                <p style="color:red;"><?php echo getErrorsMessage('date', $errors) ?></p>
            </div> <br>
            <div class="input">
                <label>Email : </label><br>
                <input id="input-type" name='email' type='email' placeholder='Your email'>
                <p style="color:red;"><?php echo getErrorsMessage('email', $errors) ?></p>
            </div> <br>
            <div class="input">
                <label>Password : </label> <br>
                <input id="input-type" name='password' type='password' placeholder='Password'>
                <p style="color:red;"><?php echo getErrorsMessage('password', $errors) ?></p>
            </div> <br>
            <div class="input">
                <label>Confirm Password : </label> <br>
                <input id="input-type" name='confirmPass' type='password' placeholder='Confirm Password'>
                <p style="color:red;"><?php echo getErrorsMessage('confirmPass', $errors) ?></p>
            </div> <br>
            <div class="input">
                <label>Phone number : </label><br>
                <input id="input-type" name='number' type='number' placeholder='Your phone number'>
                <p style="color:red;"><?php echo getErrorsMessage('number', $errors) ?></p>
            </div> <br>
            <button>SIGN UP</button>

        </div>
    </form>
</body>

</html>
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
$check = true;
$isPostMethod = $_SERVER['REQUEST_METHOD'] == 'POST';
$users = [];
//  $uppercase = preg_match('@[A-Z]@', $_POST['password']);
//  $lowercase = preg_match('@[a-z]@', $_POST['password']);
//  $numberPassword = preg_match('@[0-9]@', $_POST['password']);
//  $specialChars = preg_match('@[^\w]@', $_POST['password']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['fullName'])) {
        $errors['fullName'] = 'Vui lòng nhập họ và tên!';
        $check = false;
    } elseif (preg_match('@[0-9]@', $_POST['fullName'])) {
        $errors['fullName'] = 'Full name is not valid!';
        $check = false;
    } else {
        $fullName = $_POST['fullName'];
    }
    if (empty($_POST['date'])) {
        $errors['date'] = 'Vui lòng nhập ngày tháng năm sinh!';
        $check = false;
    } elseif ($_POST['date'] > date('Y-m-d')) {
        $errors['date'] = 'Date is not valid';
    } else {
        $date = $_POST['date'];
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Vui lòng nhập email!';
        $check = false;
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email is not valid!';
        $check = false;
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Vui lòng nhập mật khẩu!';
        $check = false;
    } elseif (strlen($_POST['password']) < 8) {
        $errors['password'] = 'Mật khẩu phải dài ít nhất 8 ký tự';
        $check = false;
    } elseif (!preg_match('@[A-Z]@', $_POST['password'])) {
        $errors['password'] = 'Mật khẩu phải có 1 chữ in hoa';
        $check = false;
    } elseif (!preg_match('@[a-z]@', $_POST['password'])) {
        $errors['password'] = 'Mật khẩu phải có 1 chữ cái thường';
        $check = false;
    } elseif (!preg_match('@[0-9]@', $_POST['password'])) {
        $errors['password'] = 'Mật khẩu phải có 1 chữ số';
        $check = false;
    } elseif (!preg_match('@[^\w]@', $_POST['password'])) {
        $errors['password'] = 'Mật khẩu phải có 1 ký tự đặc biệt';
        $check = false;
    } else {
        $password = $_POST['password'];
    }
    if (empty($_POST['confirmPass'])) {
        $errors['confirmPass'] = 'Vui lòng nhập lại mật khẩu!';
        $check = false;
    } else {
        $confirmPass = $_POST['confirmPass'];
    }
    if ($password != $_POST['confirmPass']) {
        $errors['confirmPass'] = 'Mật khẩu không trùng khớp!';
        $check = false;
    } else {
        $confirmPass = $_POST['confirmPass'];
    }
    if (empty($_POST['number'])) {
        $errors['number'] = 'Vui lòng nhập số điện thoại!';
        $check = false;
    } elseif (!preg_match('/^[0-9]{10}+$/', $_POST['number'])) {
        $errors['number'] = 'Phone number is not valid!';
        $check = false;
    } else {
        $number = $_POST['number'];
    }
    if ($check) {
        $users[] = [
            'fullName' => $fullName,
            'date' => $date,
            'email' => $email,
            'number' => $number
        ];
        $fullName = null;
        $date = null;
        $email = null;
        $number = null;
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

    <style>
        body {

            background-color: #FCFCFD;
        }
    </style>

    <form method='POST' action='<?php htmlentities($_SERVER['PHP_SELF']) ?>'>
        <h1>SIGN UP</h1>
        <div class="edit-form">
            <div class="input">
                <label>First &last name : </label><br>
                <input id="input-type" name='fullName' type='fullName' placeholder='Firt & Last Name' value="<?php echo $fullName ?>">
                <p style="color:red;"><?php echo getErrorsMessage('fullName', $errors) ?></p>
            </div> <br>
            <div>
                <label>Date of birth : </label><br>
                <input id="input-type" name='date' type='date' placeholder='Your birth day' value="<?php echo $date ?>">
                <p style="color:red;"><?php echo getErrorsMessage('date', $errors) ?></p>
            </div> <br>
            <div class="input">
                <label>Email : </label><br>
                <input id="input-type" name='email' type='email' placeholder='Your email' value="<?php echo $email ?>">
                <p style="color:red;"><?php echo getErrorsMessage('email', $errors) ?></p>
            </div> <br>
            <div class="input">
                <label>Phone number : </label><br>
                <input id="input-type" name='number' type='number' placeholder='Your phone number' value="<?php echo $number ?>">
                <p style="color:red;"><?php echo getErrorsMessage('number', $errors) ?></p>
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

            <button>SIGN UP</button>

        </div>
    </form> <br>
    <p style="text-align: center; color:green">
        <?php if ($check && $isPostMethod)
            echo "Sign up success!";
        ?>
    </p> <br>

    <div>
        <h1>data input</h1>
        <?php
        foreach ($users as $user) {
            echo 'fullName : ' .  $user['fullName'] . '<br>';
            echo 'date : ' .  $user['date'] . '<br>';
            echo 'email : ' .  $user['email'] . '<br>';
            echo 'number : ' .   $user['number'] . '<br>';
        }
        ?>



    </div>
</body>

</html>
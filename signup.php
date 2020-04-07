<?php
include 'classes/login.php';

session_start();



if (isset($_POST['submit']))
{
    signup();
}

function signup()
{

    $users = new login();


    $email = $_POST['email-input'];
    $password = $_POST['password-input'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $Database = $users->create($email, $hashed_password, 0);

    $Database = array();

    $email = "";
    $password = "";

}

?>




<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body>

<form method="post">
    <input type="email" placeholder="E-mail address..." class="email" name="email-input">
    <input type="password" placeholder="Password..." class="password" name="password-input">
    <input type="submit" name="submit" class="submit-signup" value="Signup">
</form>

</body>

</html>

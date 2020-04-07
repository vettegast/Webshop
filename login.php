<?php
include 'classes/login.php';
include 'header.php';

session_start();



if (isset($_POST['submit']))
{
    login();
}

function login()
{

    $users = new login();
    $Database = $users->index();

    if (!empty($Database[0]))
    {
        $password = $Database[0]["password"];
    }

    if (!empty($Database) && password_verify($_POST['password-input'], $password))
    {
        echo "yes";
    }
    else
    {
        echo "email and/or password is incorrect!";
    }


    $Database = array();

    $_POST['email-input'] = "";
    $_POST['password-input'] = "";

}

?>




<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Login</title>
</head>

<body>

<form method="post">
    <input type="email" placeholder="E-mail address..." class="input_email" name="email-input">
    <input type="password" placeholder="Password..." class="input_password" name="password-input">
    <input type="submit" name="submit" class="input_login" value="Log in">
    <a href="signup.php">
        <input type="button" value="Signup" class="input_signup" />
    </a>
</form>

</body>

</html>

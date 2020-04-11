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

        // execute login function to connect to database, search for the entered email and store results in the database variable

    $users = new login();
    $Database = $users->index();
    $_SESSION['error'] = "";

        // get correct hashed password from the database array and store it in a variable

    if (!empty($Database[0]))
    {
        $password = $Database[0]["password"];
    }

        // check password against email if the entered email exists in the database

    if (!empty($Database) && password_verify($_POST['password-input'], $password))
    {
        // make an array with user info and redirect if email and password match

        $_SESSION['verification'] = array($_POST['email-input'], $Database[0]["role"], $Database[0]["name"]);
        header("Location: index.php");
    }
    else
    {
        // display message if email and/or password is incorrect

        $_SESSION['error'] = "email and/or password is incorrect!";
    }



    // empty the database array and login info variables

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

<div id="error" class="error">
    <?php

    if (!empty($_SESSION['error'])) {
        echo $_SESSION['error'];
        $_SESSION['error'] = "";
    }

    ?>

</body>

</html>

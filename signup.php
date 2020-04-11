<?php
include 'classes/login.php';

session_start();


if (isset($_POST['submit'])) {
    signup();
}

function signup()
{

    // execute login function and get all users from database

    $users = new login();
    $Database = $users->index();


    if (!empty($_POST['email-input']) && !empty($_POST['password-input'])) {


        if (!empty($Database[0])) {
            echo "This email address is already in use";
        } else {

            // store email, password and the hashed password in variables

            $email = $_POST['email-input'];
            $password = $_POST['password-input'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // create a new users in the database with the variables

            $Database = $users->create($email, $hashed_password, 0);

            //empty the email, password and database

            $Database = array();

            $email = "";
            $password = "";
        }
    }
    else {
        echo "Please enter your email address and password";
    }


}

?>


<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="CSS/login.css">
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

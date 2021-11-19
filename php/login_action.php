<?php

//If login button has been clicked. 
if (isset($_POST['login'])) {
    //Variable declaration
    $username = $_POST['username'];
    $password = $_POST['password'];
    //If email or username are entered.
    if (!empty($password)) {
        //Select all from users where username or email matches entered field. 
        $dbPassword = $database->selectFrom('Password', 'users', 'Username', $username);
        //If database password is found and entered password matches password in DB.
        if (!is_null($dbPassword) && password_verify($password, $dbPassword)) {
            //Send to logged in page.
            $_SESSION['username'] =
                $database->selectFrom('Username', 'users', 'Username', $username);
            header("Location:html/homepage.php");
        } else {
            $error = 'Username or password was incorrect.';
        }
    }
    //If email/username and password and not correct, show an error.
    else {
        $error = 'Enter a username and password.';
    }
}
//If register button has been clicked. 
if (isset($_POST['register'])) {
    //Send to registration page. 
    header("Location:/html/register.php");
}

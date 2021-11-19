<?php

checkLogin();
//Sets session username
$sessionUsername = $_SESSION['username'];

//Queries DB for column information to ensure most up to date information is presented.
$firstNameQuery = $database->selectFrom('FirstName', 'users', 'Username', $sessionUsername);
$lastNameQuery = $database->selectFrom('LastName', 'users', 'Username', $sessionUsername);
$birthdayQuery = $database->selectFrom('Birthday', 'users', 'Username', $sessionUsername);
$userNameQuery = $database->selectFrom('Username', 'users', 'Username', $sessionUsername);
$emailQuery = $database->selectFrom('Email', 'users', 'Username', $sessionUsername);
$passwordQuery = $database->selectFrom('Password', 'users', 'Username', $sessionUsername);

//If user clicks go back, redirect to homepage
if (isset($_POST['goback'])) {
    header("Location:/html/homepage.php");
}
//If update input has been clicked
if (isset($_POST['update'])) {

    //Post variables declaration
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Initialize empty array for populating errors
    $errors = [];

    //If password entered matches DB password.
    if (password_verify($password, $passwordQuery)) {

        //If first name is not empty. 
        if (!empty($firstname)) {
            if (!preg_match('/[^a-z]/i', $firstname)) {
                $database->update('users', 'FirstName', $firstname, $sessionUsername);
            } else {
                $errors[] = 'New first name invalid. Please use only alphabetical characters.';
            }
        }

        //If last name is not empty. 
        if (!empty($lastname)) {
            if (!preg_match('/[^a-z]/i', $lastname)) {
                $database->update('users', 'LastName', $lastname, $sessionUsername);
            } else {
                array_push($errors, 'New last name invalid. Please use only alphabetical characters.');
            }
        }

        //If birthday name is not empty.
        if (!empty($birthday)) {
            $database->update('users', 'Birthday', $birthday, $sessionUsername);
        }
        //If username is not empty.
        if (!empty($username)) {
            if (!preg_match('/[^a-z_\-0-9]/i', $username)) {
                $database->update('users', 'Username', $username, $sessionUsername);
                $_SESSION['username'] = $username;
            } else {
                array_push($errors, 'New username invalid. Please use only alphanumeric characters.');
            }
        }

        //If email is not empty.
        if (!empty($email)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                try {
                    $database->update('users', 'Email', $email, $sessionUsername);
                } catch (\Throwable $th) {
                    session_destroy();
                    header("Location:/index.php");
                }
            } else {
                array_push($errors, 'New email invalid. Please use proper email formatting (IE: perfumery@perfume.com).');
            }
        }
    }
    //If entered does not match password in DB.
    else {
        array_push($errors, 'Password does not match stored password.');
    }

    //if there are no errors in the error array, send user to logged in page.
    if (empty($errors)) {
        header("Location:/html/homepage.php");
    }
}

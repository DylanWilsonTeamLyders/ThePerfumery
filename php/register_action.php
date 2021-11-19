<?php

//If submit button has been clicked. 
if (isset($_POST['submit'])) {
    //Variable declarations
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    //Empty errors array to receive any errors. 
    $errors = [];

    //Confirms username is alphanumeric.
    if (preg_match('/[^a-z_\-0-9]/i', $username)) {
        array_push($errors, 'Not a valid username. Please use only alphanumeric characters.');
    }
    //Confirms username is alphanumeric.
    if (preg_match('/[^a-z]/i', $firstName) || preg_match('/[^a-z_]/i', $lastName)) {
        array_push($errors, 'Not a valid first or last name. Please use only non-numeric characters and no special characters.');
    }

    //Checks if user already exists in DB. 
    $existingUsername = $database->selectFrom('Username', 'users', 'Username', $username);
    if (!is_null($existingUsername)) {
        array_push($errors, 'User with that username already exists.');
    }

    //Checks if email already exists in DB. 
    $existingEmail = $database->selectFrom('Email', 'users', 'Email', $email);
    if (!is_null($existingEmail)) {
        array_push($errors, 'User with that email already exists.');
    }

    //Validates email.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }

    // Validate password strength
    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        array_push($errors, "Password must be at least 8 characters in length and must contain at 
        least one number, one upper case letter, one lower case letter and one special character.");
    }

    //Confirms password matches second entry. 
    if ($password != $passwordConfirm) {
        array_push($errors, 'Passwords do not match.');
    }

    // If errors array is empty (no errors have been pushed), add user information to database. 
    if (empty($errors)) {
        try {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $database->insertInto($username, $email, $birthday, $passwordHash, $firstName, $lastName);
            $_SESSION['username'] = $username;
            header("Location:/html/homepage.php");
        } catch (\Throwable $th) {
            session_destroy();
            header("Location:/index.php");
        }
    }
}

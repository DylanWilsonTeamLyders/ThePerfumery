<?php

$sessionUsername = $_SESSION['username'];
checkLogin();
if (isset($_POST['deleteaccount'])) {

    try {
        $database->delete('users', $sessionUsername);
        session_destroy();
        header("Location:/index.php");
    } catch (\Throwable $th) {
        session_destroy();
        header("Location:/index.php");
    }
}
if (isset($_POST['goback'])) {
    header("Location:/html/homepage.php");
}

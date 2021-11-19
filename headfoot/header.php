<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '\class\database.php';
$database = new Database('localhost', 'root', '');
//Checks is session is started, starts one if not.
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//Line break function.
function br()
{
    echo '<br>';
}
//Loops through all errors and prints them.
function printErrors($errors)
{
    if (!is_null($errors)) {
        foreach ($errors as $error) {
            echo '<br>';
            echo $error;
            echo '<br>';
        }
    }
}
//Checks is session username is set.
function checkLogin()
{
    if (!isset($_SESSION['username'])) {
        header("Location:../index.php");
    }
}
?>
<!-- START OF HTML FOR ALL PAGES -->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/meyer.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>The Perfumery</title>
</head>

<body>
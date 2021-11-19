<?php

checkLogin();

//Session information
$sessionUsername = $_SESSION['username'];

//If user clicks Back to Home button, return to loggedin.php. 
if (isset($_POST['goback'])) {
    header("Location:/html/homepage.php");
}

//Sets arrays for wishlist and owned.
$userCheck = $database->selectFrom('Wishlist', 'drag', 'Username', $_SESSION['username']);

// If the user does not exist in the database
function userExists($checkedName, $sessionUsername)
{
    if (empty($checkedName)) {
        global $database;
        $database->insertIntoDrag($sessionUsername);
    }
}

//Checks if user has visited the perfume tracker before.
userExists($userCheck, $sessionUsername);

$wishlist =  json_decode($database->selectFrom('Wishlist', 'drag', 'Username', $_SESSION['username']));
$owned =  json_decode($database->selectFrom('Owned', 'drag', 'Username', $_SESSION['username']));

//Loops through a JSON object and echoes all true keys as imgs. 
function printPictures($array, $columnName)
{
    foreach ($array as $key => $value) {
        if ($value == 1) {
            echo '<img src="../images/dragimgs/' . $key . '.jpg" id="' . $columnName . $key . '" class="draggable" draggable="true" ondragstart="onDragStart(event);">';
        }
    }
}

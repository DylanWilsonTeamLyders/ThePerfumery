<?php

//Starts a session to reference the $_SESSION['username'], and sets that to a variable.
session_start();
$sessionUsername = $_SESSION['username'];

//Sets the errors variable to declare no variables unless changed later.
$errors = 'Executed with no errors!';

//PDO Connection
$servername = "localhost";
$username = "root";
$password = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=theperfumery", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $errors = "Connection failed: " . $e->getMessage();
}

// Get the input from the client side as POST data
$perfumeName = strtolower($_POST['perfumeName']);
echo $perfumeName;
$areaName = $_POST['areaName'];

//Removes the precursor words from the items ID (wishlistID, ownedID)
$removeWords = ['wishlist', 'owned'];
$perfumeName = str_replace($removeWords, '', $perfumeName);

//If $areaName = dropzoneOwned or dropzoneWishlist
switch ($areaName) {
    case 'dropzoneOwned':
        //Update statement to remove item from Wishlist json
        $changeWishlist = "UPDATE drag
            SET Wishlist = JSON_REPLACE(Wishlist, '$.$perfumeName', 0) 
            WHERE Username = '$sessionUsername';";
        //Update statement to add item to Owned json
        $changeOwned = "UPDATE drag
            SET Owned = JSON_REPLACE(Owned, '$.$perfumeName', 1) 
            WHERE Username = '$sessionUsername';";
        //Execute SQL statements
        $conn->exec($changeWishlist);
        $conn->exec($changeOwned);
        break;
    case 'dropzoneWishlist':
        //Update statement to add item to Wishlist json
        $changeWishlist = "UPDATE drag
            SET Wishlist = JSON_REPLACE(Wishlist, '$.$perfumeName', 1) 
            WHERE Username = '$sessionUsername';";
        //Update statement to remove item from Owned json
        $changeOwned = "UPDATE drag
            SET Owned = JSON_REPLACE(Owned, '$.$perfumeName', 0) 
            WHERE Username = '$sessionUsername';";
        //Execute SQL statements
        $conn->exec($changeWishlist);
        $conn->exec($changeOwned);
        break;
    default:
        //If the switch case does not work for any reason change errors.
        $errors = 'Errors in the switch!';
        break;
}
//Leave the AJAX call and throw any errors that happened.
exit($errors);

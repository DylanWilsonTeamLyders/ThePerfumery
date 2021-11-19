<?php
checkLogin();
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:/index.php");
}
if (isset($_POST['delete'])) {
    header("Location:/html/delete.php");
}
if (isset($_POST['update'])) {
    header("Location:/html/update.php");
}
if (isset($_POST['tracker'])) {
    header("Location:../html/drag.php");
}

//Gets wishlist from DB. 
$wishlist = json_decode($database->selectFrom('Wishlist', 'drag', 'Username', $_SESSION['username'])) ?? null;
$wishlistArr = [];

//If Wishlist does not exist, the $ownedArr will be used.
$ownedArr = ['angelsshare', 'codeedp', 'millisemeimperial', 'oudwood', 'overthechocolateshop', 'rockymountainwood', 'royaloud', 'tobaccovanille'];

//Pushes all keys with value of 1 from wishlist into a new array.
foreach ($wishlist as $key => $value) {
    if ($value == 1) {
        array_push($wishlistArr, $key);
    }
}

//If wishlist array is not empty.
if (!empty($wishlistArr)) {
    $randWishlist = array_rand($wishlistArr, 1);
    //Set picture on homepage = to random value from array. 
    $picture = $wishlistArr[$randWishlist] . '.jpg';
} else {
    $randWishlist = array_rand($ownedArr, 1);
    //Set picture on homepage = to random value from array. 
    $picture = $ownedArr[$randWishlist] . '.jpg';
}

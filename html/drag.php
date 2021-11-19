<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '\headfoot\header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '\php\drag_action.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfume Tracker</title>
</head>

<body>
    <div class="drag-container">
        <div class="sub-container">
            <div class="dropzone" id="dropzoneWishlist" ondragover="onDragOver(event);" ondrop="onDrop(event);">
                <h1 class="titlebar">Wishlist</h1>
                <?php
                //Loops through the JSON wishlist object and echos all of the keys valued true as an <img>
                printPictures($wishlist, 'wishlist')
                ?>
            </div>
        </div>

        <div id="sub-container">
            <div class="dropzone" id="dropzoneOwned" ondragover="onDragOver(event);" ondrop="onDrop(event);">
                <h1 class="titlebar">Owned</h1>
                <?php
                //Loops through the JSON owned object and echos all of the keys valued true as an <img>
                printPictures($owned, 'owned')
                ?>
            </div>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="text-container">
            <input type="submit" name="goback" value="Back to Home" id="drag-home" />
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/js/drag.js"></script>

</body>

</html>

<?php

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '\headfoot\header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '\php\delete_action.php';
?>

<div class="outer-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container body-text">
        <div class="text-container">
            <h1 class="title text-center" name="delete-title">Are Sure You Would Like to Delete Your Perfumery Account <?php echo $_SESSION['username']; ?>?</h1>
            <h2 class="subtitle text-center">All of your stored information will be deleted and unaccessible after this!</h2>
            <input type="submit" name="deleteaccount" value="Yes!" />
            <input type="submit" name="goback" value="No!" />
        </div>
    </form>
</div>
</body>

</html>
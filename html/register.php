<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/headfoot/' . 'header.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/' . 'register_action.php';


?>

<div class="outer-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container body-text">
        <div class="text-container">
            <h1 class="title" style="text-align: center;">Register</h1>
            <label class="long-form" for="firstName">First Name</label>
            <input class="long-form" type="text" name="firstName" maxlength="100" required>
            <label class="long-form" for="lastName">Last Name</label>
            <input class="long-form" type="text" name="lastName" maxlength="100" required>
            <label class="long-form" for="username">Username</label>
            <input class="long-form" type="text" name="username" maxlength="100" required>
            <label class="long-form" for="email">Email Address</label>
            <input class="long-form" type="text" name="email" maxlength="100" required>
            <label class="long-form" for="birthday">Birthday</label>
            <input class="long-form" type="date" name="birthday" min="1900-12-31" max="<?php echo date("Y-m-d"); ?>" required>
            <label class="long-form" for="password">Password</label>
            <input class="long-form" type="password" name="password" maxlength="100" required>
            <label class="long-form" for="passwordConfirm">Confirm Password</label>
            <input type="password" name="passwordConfirm" required>
            <input type="submit" name="submit" value="Register" class="submit-button">
            <h2 class="errors">
                <?php printErrors($errors); ?>
            </h2>
        </div>
    </form>
</div>
</body>

</html>
<?php

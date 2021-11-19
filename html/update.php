<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '\headfoot\header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '\php\update_action.php';
?>

<div class="outer-container">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container body-text">
        <div class="text-container">
            <h1 class="title text-center">Update Information</h1>
            <label class="long-form" for="firstname">First name is: <?php echo $firstNameQuery; ?></label>
            <input class="long-form" type="text" name="firstname" maxlength="100" placeholder="Change first name">
            <label class="long-form" for="lastname">Last name is: <?php echo $lastNameQuery; ?></label>
            <input class="long-form" type="text" name="lastname" maxlength="100" placeholder="Change last name">
            <label class="long-form" for="birthday">Birthday is: <?php echo $birthdayQuery; ?></label>
            <input class="long-form" type="date" name="birthday" min="1900-12-31" max="<?php echo date("Y-m-d"); ?>">
            <label class="long-form" for="username">Username is: <?php echo $userNameQuery; ?></label>
            <input class="long-form" type="text" name="username" maxlength="100" placeholder="Change username">
            <label class="long-form" for="email">Email address is: <?php echo $emailQuery; ?></label>
            <input class="long-form" type="text" name="email" maxlength="100" placeholder="Change email address">
            <label class="long-form" for="password">Confirm your password:</label>
            <input type="password" name="password">
            <input type="submit" name="update" value="Update" class="submit-button">
            <input type="submit" name="goback" value="Back to Homepage" />
            <h2 class="errors">
                <?php printErrors($errors); ?>
            </h2>
        </div>

    </form>

</div>
</body>

</html>
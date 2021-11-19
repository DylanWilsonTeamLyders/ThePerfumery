<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '\headfoot\header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '\php\homepage_action.php';
?>
<div class="outer-container">
    <form method="POST" class="form-container body-text">

        <div class="text-container">
            <h1 class="title text-center">The Perfumery</h1>
            <h2 class="subtitle">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            <img src="/images/dragimgs/<?php echo $picture ?>" alt="" name="landing-page-image">
            <input type="submit" name="tracker" value="Perfume Tracker" />
            <input type="submit" name="update" value="Update Account" />
            <input type="submit" name="delete" value="Delete Account" />
            <input type="submit" name="logout" value="Log Out" />
        </div>
    </form>
</div>
</body>

</html>
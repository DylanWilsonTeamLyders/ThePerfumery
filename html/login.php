<?php require_once 'php/login_action.php' ?>
<div class="outer-container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-container body-text">
		<div class="img-container">
			<img src="/images/splashimg.jpg" alt="" id="splash-img">

		</div>
		<div class="text-container">
			<h1 class="title">The Perfumery</h1>
			<label for="emailUsername">Username</label>
			<input type="text" name="username">
			<label for="password">Password</label>
			<input type="password" name="password">
			<input type="submit" name="login" value="Log In" class="submit-button">
			<input type="submit" name="register" value="Register" class="submit-button">
			<h2 class="errors">
				<?php echo $error ?>
			</h2>
		</div>
	</form>
</div>

</body>

</html>
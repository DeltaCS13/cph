<?php
	include('includes/loginheader.php');
	require ('../functions/functions.php');
?>
<article>

<form action="index.php" method="post">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Nick Name" required="" name="nickName" />
			</div>
			<div>
				<input type="password" placeholder="********" required="" name="password" />
			</div>
			<div>
				<input type="submit" value="Login" />
				<!--<a href="#">Lost your password?</a>
				<a href="#">Register</a>-->
			</div>
		</form><!-- form -->



<?php
	include('includes/footer.php');
?>
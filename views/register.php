<?php
	include('includes/loginheader.php');
	require ('../functions/functions.php');
?>


<h1>Registration page</h1>


<form action="index.php" method="post" id="registerForm">
<h2>Register:</h2>

	<input type="hidden" name="action" value="register">

	<label>First Name:<br><input type="text" name="firstName" value="required" required></label><br>

	<label>Last Name:<br/><input type="text" name="lastName" value="required" required></label><br/>

	<label>Nick Name (User ID):<br/><input type="text" name="nickName" value="required" required></label><br />

	<label>Password:<br/><input type="password" name="password" value="required" required></label><br />

	<label>Re-Type Password:<br/><input type="password" name="repassword" value="required" required></label><br />


	<input type="submit" value="Register" />
</form>

<article>
	<p><a href="../index.php?action=logout">Log Out</a></p>
</article>
<?php
	include('includes/footer.php');
?>
<?php
	include('../includes/loginheader.php');
	require ('../../functions/functions.php');
	
?>
<article class="content1">


	<div class="form1">
		<form action="index.php" method="post" id="loginForm">
			<fieldset>
				<legend>CPH Member Login</legend>
					<p>Fields marked with an asterisks (*) are requiered.</p>
			</fieldset>
				<input type="hidden" name="action" value="login">
					<label>Trail Name *:<br>
					<input type="text" name="nickName" placeholder="User Name" required autofocus title="Nick Name (Your User Name/User ID) is a required field"><br>
					<label>Pasword *:<br>
					<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br>
						<input type="submit" value="login" />
						<!--<a href="#">Lost your password?</a>
						<a href="#">Register</a>-->
					</div>
		</form><!-- form -->
	</div><!--/form-->
</article>
<article>
	<p><a href="../index.php?action=logout">Log Out</a></p>
</article>

<?php
	include('../includes/loginfooter.php');
?>
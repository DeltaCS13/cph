<?php
	include('includes/loginheader.php');
	require ('../functions/functions.php');
?>
<article>



<form action="../" method="post" id="loginForm">
<h2>Login:</h2><br /><br />
<input type="hidden" name="action" value="login">
			<label>Nick Name:<br/><input type="text" name="nickName" value="required" required></label><br/>
			<label>Pasword:<br/><input type="password" name="password" value="required" required></label><br/>
				<input type="submit" value="login" />
				<!--<a href="#">Lost your password?</a>
				<a href="#">Register</a>-->
			</div>
		</form><!-- form -->

</article>
<article>
	<form action="../" method="post" id="logoutForm">
<h2>Login:</h2><br /><br />
<input type="hidden" name="action" value="logout">
			
				<input type="submit" value="logout" />
				<!--<a href="#">Lost your password?</a>
				<a href="#">Register</a>-->
			</div>
		</form><!-- form -->	
</article>

<?php
	include('includes/footer.php');
?>
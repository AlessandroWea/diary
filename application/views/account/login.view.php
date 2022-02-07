<div class="login-wrapper">
	<form method="POST" class="logging-form" action="<?=SERVER_PATH . 'login';?>">
		<h1>Log in!</h1>
		<p><?=$errmsg;?></p>
		<input value="<?=$email;?>" name="email" placeholder="Enter your email" type="text">
		<input name="password" placeholder="Enter your password" type="password">
		<input type="submit" value="Click!">
	</form>
</div>
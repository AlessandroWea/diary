<div class="login-wrapper">
	<form method="POST" class="logging-form" action="<?=SERVER_PATH . 'signup';?>">
		<h1>Sign up!</h1>
		<p><?=$errmsg;?></p>
		<input value="<?=$email;?>" name="email" placeholder="Enter your email" type="text">
		<input value="<?=$name;?>" name="name" placeholder="Enter your name" type="text">
		<input name="password" placeholder="Enter your password" type="password">
		<input name="password_repeat" placeholder="Repeat your password" type="password">
		<input type="submit" value="Click!">
	</form>
</div>
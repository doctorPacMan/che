{include file='_intro.tpl'}

<form action="./" name="register" method="post">
	<h3>Register</h3>
	<fieldset>
		<label for="login">Login</label>
		<input type="text" name="login" />
	</fieldset>
	<fieldset>
		<label for="password">Password</label>
		<input type="text" name="password" />
	</fieldset>
	<fieldset>
		<label for="about">About</label>
		<textarea></textarea>
	</fieldset>
	<fieldset><input type="submit" /></fieldset>
</form>

{include file='_outro.tpl'}
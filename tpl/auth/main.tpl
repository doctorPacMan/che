{include file='_intro.tpl'}

{if !empty($message)}<pre>{$message}</pre>{/if}

<form class="wrpr" action="./" name="login" method="post">
	<h3>Login</h3>
	<input type="hidden" name="action" value="login" />
	<fieldset>
		<label for="login">Login</label>
		<input type="text" name="login" />
	</fieldset>
	<fieldset>
		<label for="password">Password</label>
		<input type="text" name="password" />
	</fieldset>
	<fieldset><input type="submit" /></fieldset>
</form>

{*
<div class="wrpr oauth-apps">
{assign var='appid_yandex' value='0f1068c928064417a02612612099cd0f'}
<a onclick="oauth.popup(this,event)" href="https://oauth.yandex.ru/authorize?response_type=token&amp;display=popup&amp;client_id={$appid_yandex}">Yandex</a>
</div>
*}
{include file='_outro.tpl'}
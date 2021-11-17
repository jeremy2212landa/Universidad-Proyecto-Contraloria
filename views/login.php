<?php
print('<div align="center">
<form method="post">
	<div>
		<input type="text" name="loginuser" placeholder="usuario" required>
	</div>
	<div>
		<input type="password" name="loginpass" placeholder="password" required>
	</div>
	<div>
		<input type="submit" class="button" value="Enviar">
	</div>
</form>
');

if( isset($_GET['error']) ) {
	$template = '
			<div class="container">
				<p class="item  error">%s</p>
			</div>
		</div>
	';

	printf($template, $_GET['error']);
}

?>

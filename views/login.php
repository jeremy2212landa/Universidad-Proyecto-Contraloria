<?php
$template = '
<div class="log">
	<img class="icon-log" src="./public/img/CEBM.png">
	<form method="post">
		<div>
			<input type="text" maxlength="30" name="loginuser" placeholder="Usuario" required>
		</div>
		<div>
			<input type="password" maxlength="32" name="loginpass" placeholder="Contraseña" required>
		</div>
		<div>
			<input type="submit" class="button" value="Aceptar">
		</div>
	</form>
';

if( isset($_GET['error']) ) {

	$template .= '
			<div class="err">
				<p class="item-error">'. $_GET['error'] .'</p>
			</div>';

}

$template .= '</div>';
printf($template);
?>

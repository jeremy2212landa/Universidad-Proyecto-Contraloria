<?php
class Router {
	public $route;

	public function __construct($route) {
		$session_options = array(
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		);

		if( !isset($_SESSION) )  session_start();

		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;


		if($_SESSION['ok']) {
			//Aquí va toda la programación de nuestra webapp
			$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';

			$controller = new ViewController();
			// var_dump($this->route);
			switch ($this->route) {
				case 'home':
					if ( !isset($_POST['r']) ) $controller->load_view('home');
					else if( ($_POST['r']) == 'edit_curso' )  $controller->load_view('edit_curso');
					else if( ($_POST['r']) == 'delete_curso' )  $controller->load_view('delete_curso');
					else if( ($_POST['r']) == 'add_curso' )  $controller->load_view('add_curso');
					else if( ($_POST['r']) == 'info_curso' )  $controller->load_view('info_curso');
					else if( ($_POST['r']) == 'add_usuario' )  $controller->load_view('add_usuario');
					break;

				case 'cursos':
						if ( !isset($_POST['r']) ) $controller->load_view('cursos');
						else if( $_POST['r'] == 'curso_edit' )  $controller->load_view('curso_edit');
						break;

				case 'users':
						if ( !isset($_POST['r']) ) $controller->load_view('users');
						else if( $_POST['r'] == 'add_user' )  $controller->load_view('add_user');
						else if( $_POST['r'] == 'edit_user' )  $controller->load_view('edit_user');
						else if( $_POST['r'] == 'delete_user' )  $controller->load_view('delete_user');
				break;

				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;

				default:
					$controller->load_view('error404');
					break;
			}
		} else {
			if( !isset($_POST['loginuser']) && !isset($_POST['loginpass']) ) {
				//mostrar un formulario de autenticación
				$login_form = new ViewController();
				$login_form->load_view('login');
			}
			else {
				$user_session = new SessionController();
				$sexion = $user_session->login($_POST['loginuser'], $_POST['loginpass']);

				if( empty($sexion) ) {
					//echo 'El usuario y el password son incorrectos';
					$login_form = new ViewController();
					header('Location: ./?error=El usuario ' . $_POST['loginuser'] . ' y el password proporcionado no coinciden');
					$login_form->load_view('login');
				} else {
					// echo 'El usuario y el password son correctos';
					// var_dump($session);

					$_SESSION['ok'] = true;

					foreach ($sexion as $row) {
						$_SESSION['user_id'] = $row['user_id'];
						$_SESSION['user_name'] = $row['user_name'];
						$_SESSION['user_email'] = $row['user_email'];
						$_SESSION['user_pass'] = $row['user_pass'];
						$_SESSION['role'] = $row['role'];
					}

					header('Location: ./');
				}
			}
		}
	}

}

?>

<?php
include('../gust.config.php');

$usuario = $_SESSION['id'];

if( !empty($usuario) ){

	$us = mysql_fetch_object(mysql_query("SELECT u_id, u_nombre, u_slogan, u_facebook, u_cargo, u_token, u_fecha FROM  lax_usuario WHERE  u_facebook = '".$usuario."' "));
	$permiso = $us->u_cargo||0;

	$nombre = $_SESSION['nombre'];
	$imagen = 'http://graph.facebook.com/'.$_SESSION['id'].'/picture?type=large';
	$facebook = 'http://fb.com/'.$_SESSION['id'];
	$token = $us->u_token;

	switch ($permiso) {
		case 2:
			$cmd = &$_GET['cmd'];
			switch ($cmd) {
				case 'usuario':
					if(is_numeric($_GET['id'])){
						$_contenido = 'html/usuario.editar.php';
					}else{
						$_contenido = 'html/usuario.php';
					}
				break;
				
				default:
					$_contenido = 'html/index.php';
				break;
			}
		break;
		case 1:
			$_contenido = 'html/locutor.php';
		break;
		default:

			mysql_query("INSERT INTO lax_usuario (u_nombre,u_facebook,u_cargo,u_token,u_fecha) VALUES ('".$_SESSION['nombre']."','".$_SESSION['id']."','0','".uniqid()."', '".time()."') ");

			echo '<div class="container-fluid"><h1> NO TIENES PERMISO CONSULTA CON EL DUEÑO DE LA RADIO. ID: '.$_SESSION['id'].'</h1></div>';
			exit();
		break;
	}

}else{

	$_contenido = 'html/login.php';

}


include($_html.'contenedor.php');
?>
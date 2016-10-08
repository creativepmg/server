<?php
include('gust.config.php');


if($_GET['cmd'] == 'pelada'){
	$texto = 'RLX170phillip - Probando cancion';
	preg_match('/RLX([a-zA-Z-0-9-_]+) - (.*)/', $texto, $var );
	$us = mysql_fetch_array(mysql_query("SELECT u_nombre, u_facebook, u_cargo FROM lax_usuario WHERE u_token = '".$var[1]."'"));
	print_r($us);
}

$track =  file_get_contents('http://relaxradio-currentsong.juanintorres.cl/');
$track = json_decode($track);

preg_match('/RLX([a-zA-Z-0-9-_]+) - (.*)/', $track->title, $var );

$us = mysql_fetch_array(mysql_query("SELECT u_nombre, u_facebook, u_cargo FROM lax_usuario WHERE u_token = '".$var[1]."'"));

if(!empty($us['u_nombre'])){
	$locutor = $us['u_nombre'];
	$imagen = 'http://graph.facebook.com/'.$us['u_facebook'].'/picture?type=large';
	$musica = $var[2];
	$link = 'https://fb.com/'.$us['u_facebook'];
}else{
	$locutor = 'AUTO DJ';
	$imagen = 'http://graph.facebook.com/relaxradiofm/picture?type=large';
	$musica = $track->title;
	$link = 'https://fb.com/relaxradiofm';
}



echo json_encode(array( 'title' => $musica, 'locutor' => $locutor, 'imagen' => $imagen, 'perfil' => $link ));

?>
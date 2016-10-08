<?php
require './src/facebook.php';
$facebook = new Facebook(array(
  'appId'  => '1260069264017369',
  'secret' => 'd2fb64359ac9b8ed4abec0b29e6a643d',
));

$user = $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}


if (!empty($user_profile['id'])) {
  //$logoutUrl = $facebook->getLogoutUrl();
  $id = ( !empty($user_profile['username']) ) ? $user_profile['username'] : $user_profile['id'];

  $conexion = @mysql_connect("localhost","rrfm_web","luisdj3d") or die("No se pudo conectar a la base de datos. <b>mysql_connect</b>");
  @mysql_select_db("rrfm_web",$conexion) or die("Base de dato es incorecto. <b>mysql_select_db</b>");

  $_SESSION['id'] = $id;
  $_SESSION['nombre'] = $user_profile['name'];
  $_SESSION['imagen'] = 'http://graph.facebook.com/'.$id.'/picture';
  $_SESSION['red'] = 'facebook';

  mysql_query("INSERT INTO lax_usuario (u_nombre,u_facebook,u_cargo,u_token,u_fecha) VALUES ('".$user_profile['name']."','".$id."','0','".uniqid()."', '".time()."') ");

  echo '<script type="text/javascript">';
  echo "o = [";
  echo '{ id: "'.$id.'", nombre: "'.$user_profile['name'].'", red: "facebook"  }'."\n";
  echo "]\n";
  //header('Location: http://relaxradio.fm/chat/');
  echo 'window.opener.cargar_datos(o);
  window.close();
  </script>';
  // header('Location: ../../');
} else {
  $loginUrl = $facebook->getLoginUrl();
  header('Location: ' . $loginUrl);
}

?>
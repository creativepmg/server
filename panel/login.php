<?php
require '../chat/auth/facebook/src/facebook.php';
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

  $_SESSION['id'] = $id;
  $_SESSION['nombre'] = $user_profile['name'];
  $_SESSION['imagen'] = 'http://graph.facebook.com/'.$id.'/picture';
  $_SESSION['red'] = 'facebook';

  mysql_query("INSERT INTO lax_usuario (u_nombre,u_facebook,u_cargo,u_token,u_fecha) VALUES ('".$user_profile['name']."','".$id."','0','".uniqid()."', '".time()."') ");


  header('Location: http://www.relaxradio.fm/panel/');
} else {
  $loginUrl = $facebook->getLoginUrl();
  header('Location: ' . $loginUrl);
}

?>
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

  $_SESSION['id'] = $id;
  $_SESSION['nombre'] = $user_profile['name'];
  $_SESSION['imagen'] = 'http://graph.facebook.com/'.$id.'/picture';
  $_SESSION['red'] = 'facebook';

  echo '<script type="text/javascript">';
  echo "o = [";
  echo '{ id: "'.$id.'", nombre: "'.$user_profile['name'].'", red: "facebook"  }'."\n";
  echo "]\n";
  //header('Location: http://relaxradio.fm/chat/');
  echo 'window.opener.cargar_datos(o);
  </script>';
  header('Location: http://relaxradio.fm/chat/indexapp.php');
} else {
  $loginUrl = $facebook->getLoginUrl();
  header('Location: ' . $loginUrl);
}

?>
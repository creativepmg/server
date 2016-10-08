<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>RelaxRadio.fm - Radio en linea</title>
    <!-- Bootstrap Core CSS -->
    <base href="<?php echo $_base; ?>" target="_self"/>
    <link href="<?php echo $_base; ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $_base; ?>css/main.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top top-nav">
<a class="logo_m" href="#"><img src="logo.png"> relaxradio.fm</a>
<button type="button" class="bt-menu navbar-toggle glyphicon glyphicon-menu-hamburger" id="menu-toggle"></button>
<button type="button" class="bt-chat navbar-toggle glyphicon glyphicon-comment" id="chat-toggle"></button>
</div>

<div id="wrapper">

<!-- Sidebar -->
<div id="sidebar-wrapper">
  <a class="logo" href=""> <img src="logo.png"></a>
  <ul class="sidebar-nav">
    <li class="sidebar-brand"> <a href="#">RELAXRADIO.FM</a> </li>
    <li>
      <a href="#">Inicio</a>
    </li>
    <li>
      <a href="#">Noticias</a>
    </li>
    <li>
      <a href="#">Videos</a>
    </li>
    <li>
      <a href="#">Events</a>
    </li>
    <li>
      <a href="#">About</a>
    </li>
    <li>
      <a href="#">Contact</a>
    </li>
  </ul>
  <div class="djlive">
    <div class="avatar">
      <a href="https://fb.com/relaxradiofm" rel="nofollow" target="_blank" ><img src="http://graph.facebook.com/relaxradiofm/picture?type=large"></a>
    </div>
    <div class="content">
      <p class="glyphicon glyphicon-globe"> <span>ON LINE</span></p>
      <p class="glyphicon glyphicon-flash"> <span class="locutor">RELAX AUTO DJ</span></p>
    </div>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

<?php

$cont = $_contenido;
if($cont){
  @include($cont);
}else{
  echo '<div class="container-fluid"><h1>No hay contenido ...</h1></div>';
}

?>

</div>
<!-- /#page-content-wrapper -->

<div id="sidebar-chat">
  <div id="rimay_chat"></div>
   


</div>


<div id="player"> 
  <div class="jp-controls">
     <div> <a class="jp-play"><i class="glyphicon glyphicon-pause"></i></a> </div>
     <div> <a class="jp-mute" title="mute"><i class="glyphicon glyphicon-volume-up"></i></a> </div>
     <div> <a class="jp-repeat" title="Actualizar"><i class="glyphicon glyphicon-refresh"></i></a> </div>
     <div class="title">
      <div class="on"><i class="glyphicon glyphicon-headphones"></i> <span> Cool - Feat. Roy English</span></div>
     </div>
  </div>
</div>

</div>
<!-- /#wrapper -->
<script type="text/javascript">
/*
  Website por: Luis Gustavo -> http://fb.com/grunst3r
*/
var el,volumen = 100,rand,repeat,calidad = 'small';
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var radioIP = 'http://198.100.152.234:8000/;';
</script>

<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
<!--<script src="js/bootstrap.min.js"></script>-->
 <script src="http://api.rimay.pe/rimay.js?key=2e767460d6819076a847d500423e98e5&tag=rimay_chat"></script>
</body>

</html>

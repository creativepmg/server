<?php 
session_start();

$conexion = @mysql_connect("localhost","rrfm_web","luisdj3d") or die("No se pudo conectar a la base de datos. <b>mysql_connect</b>");
@mysql_select_db("rrfm_web",$conexion) or die("Base de dato es incorecto. <b>mysql_select_db</b>");

$_base = 'http://www.relaxradio.fm/';

$_html = $_SERVER['DOCUMENT_ROOT'].'/gust.html/';


?>
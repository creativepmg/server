<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

if(!empty($_SESSION['id'])){
$u_id = $_SESSION['id'];
$u_nombre = $_SESSION['nombre'];
$u_red = $_SESSION['red'];
$u_foto = $_SESSION['imagen'];
$u_permiso = 1;

echo json_encode( array( "id" => $u_id, "nombre" => $u_nombre, "red" => $u_red, "foto" => $u_foto, "token" => md5(md5($u_id.$u_permiso.'grunst3r')) ));
}

?>
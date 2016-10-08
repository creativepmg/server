<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="panel/">Administrador</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="panel/?cmd=usuario"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
      <li><a href="#"><i class="glyphicon glyphicon-file"></i> Noticias</a></li>
      <li><a href="#"><i class="glyphicon glyphicon-facetime-video"></i> Videos</a></li> 
      <li><a href="#"><i class="glyphicon glyphicon-tag"></i> Eventos</a></li> 
    </ul>
  </div>
</nav>

<div class="container-fluid">

<div class="row">
  <div class="col-lg-5">
    <div class="media">
      <a class="pull-left" href="#">
      <img class="media-object dp img-circle" src="<?php echo $imagen; ?>" style="width:50px;height:50px;">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $nombre; ?> <small> Administrador</small></h4>
        <hr style="margin:8px auto">
        <p> <b>ID Transmisión:</b> RLX<?php echo $token; ?></p>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <span class="glyphicon glyphicon-list"></span> Lista de Locutores
  </div>
  <div class="panel-body">
    <ul class="list-group">
    <?php

    $sqld = mysql_query("SELECT u_id, u_nombre, u_slogan, u_facebook, u_cargo, u_token, u_fecha FROM  lax_usuario WHERE  u_cargo = '1' ");

    while ($ob = mysql_fetch_object($sqld)) {
      if(!empty($ob->u_nombre)){
        $link = 'panel/?cmd=usuario&id='.$ob->u_id;
      echo '<li class="list-group-item">
        <div class="checkbox"> '.$ob->u_nombre.' </div>
        <div class="pull-right action-buttons"> <a href="'.$link.'"><span class="glyphicon glyphicon-pencil"></span></a> </div>
      </li>';
      }
    }


    ?>
    </ul>
  </div>
  <div class="panel-footer">
    <div class="row">
      <div class="col-md-6">
        <ul class="pagination pagination-sm pull-right">
          <li class="disabled"><a href="#">«</a></li>
          <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
<div class="container-fluid">

<style>
.trash { color:rgb(209, 91, 71); }
.flag { color:rgb(248, 148, 6); }
.panel-body { padding:0px; }
.panel-footer .pagination { margin: 0; }
.panel .glyphicon,.list-group-item .glyphicon { margin-right:5px; }
.panel-body .radio, .checkbox { display:inline-block;margin:0px; }
.panel-body input[type=checkbox]:checked + label { text-decoration: line-through;color: rgb(128, 144, 160); }
.list-group-item:hover, a.list-group-item:focus {text-decoration: none;background-color: rgb(245, 245, 245);}
.list-group { margin-bottom:0px; }
</style>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>componentes/css/bootstrap.css">
        <link rel="stylesheet" href="http://www.bootstrap-switch.org/static/stylesheets/bootstrap-switch.css">
        <link rel="stylesheet" href="<?php echo base_url();?>componentes/stylesheets/flat-ui-fonts.css">
        <link rel="stylesheet" href="<?php echo base_url();?>componentes/css/jquery.stepy.css" />
        <link rel="stylesheet" href="<?php echo base_url();?>componentes/css/chosen.css" />
       
    </head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="<?php echo base_url();?>"><img height="60px" src="<?php echo base_url()?>componentes/img/logo.jpg" alt=""></a>
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse" id="navbar-main">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Recibos <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="themes">
            <li><a tabindex="-1" href="">Enero</a></li>
            
            <li><a tabindex="-1" href="">Febrero</a></li>
            <li><a tabindex="-1" href="">Marzo</a></li>
            <li><a tabindex="-1" href="">Abril</a></li>
            <li><a tabindex="-1" href="">Mayo</a></li>
            <li><a tabindex="-1" href="">Junio</a></li>
            <li><a tabindex="-1" href="">Julio</a></li>
            <li><a tabindex="-1" href="">Agosto</a></li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="">Septiembre</a></li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="">Octubre</a></li>
            <li><a tabindex="-1" href="">Noviembre</a></li>
            <li><a tabindex="-1" href="">Diciembre</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url()?>venta/">Reservar</a>
        </li>
        <li>
          <a href="<?php echo base_url()?>perfil/">Info</a>
        </li>
        
      </ul>
    </div>
  </div>
</div>
<div class="container">
<div class="bs-docs-section"><div class="row">
        <div class="col-lg-12">
            <?if (isset($nombres)) {?>
          <div class="page-header2">
          <nav class="navbar navbar-default" role="navigation">
        <div class="">
          <div class="navbar-text pull-left"><a href="" class="btn btn-danger btn-xs" title="">Cerrar Session</a></div>
          
          <p class="navbar-text pull-right">Bienvenido <a href="#" class="navbar-link"><?=$nombres?> <?=$apellidos?> </a><img src="<?=base_url()?>uploads/<?=$thumb?>" width="32px" alt=""></p>
        </div>
      </nav>
          </div><?}?>
        </div>
      </div></div>
</div>
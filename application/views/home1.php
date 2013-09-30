<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url();?>componentes/css/bootstrap.css">
        <link rel="author" href="humans.txt">
    </head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a href="../" class="navbar-brand">Portal</a>
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
          <a href="">Reservar</a>
        </li>
        <li>
          <a href="">Info</a>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Download <span class="caret"></span></a>
          <ul class="dropdown-menu" aria-labelledby="download">
            <li><a tabindex="-1" href="./bootstrap.min.css">bootstrap.min.css</a></li>
            <li><a tabindex="-1" href="./bootstrap.css">bootstrap.css</a></li>
            <li class="divider"></li>
            <li><a tabindex="-1" href="./variables.less">variables.less</a></li>
            <li><a tabindex="-1" href="./bootswatch.less">bootswatch.less</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://builtwithbootstrap.com/" target="_blank">Bienvenido <?php echo $nombres;?></a></li>
      </ul>

    </div>
  </div>
</div>
<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">Forms</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-3">
        <div class="well">ola kase</div>
      </div>
      <div class="col-lg-6">
        <div class="well">
          <? echo form_open('email/index',$att);?>
            <fieldset>
              <legend>Notificar</legend>
              <div class="form-group">
                <label for="inputPassword" class="col-lg-2 control-label">Nombre:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <label for="textArea" class="col-lg-2 control-label">Mensaje</label>
                <div class="col-lg-10">
                  <textarea class="form-control" rows="3" id="mensaje" name="mensaje"></textarea>
                  <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button class="btn btn-default">Cancel</button> 
                  <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
              </div>
            </fieldset>
          <? echo form_close();?>
          <?php echo validation_errors('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>','</div>'); ?>
        </div>
      </div>

    </div>
  </div>
</div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>componentes/js/bootstrap.js" ></script>
    </body>
</html>
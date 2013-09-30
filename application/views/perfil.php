<div class="container">
  <div class="bs-docs-section">

    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
          <a href="<?php echo base_url();?>" class="list-group-item">
            <span class="glyphicon glyphicon-home"></span>Principal
          </a>
          <a href="#" class="list-group-item active"><span class="glyphicon glyphicon-user"></span> Datos Personales
          </a>
          <a href="<?php echo base_url()?>venta/" class="list-group-item"><span class="glyphicon glyphicon-time"></span> Reservaciones
          </a>
          <a href="#" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Cuotas
          </a>
          <a href="<?php echo base_url()?>auth/logout/" class="list-group-item  active"><span class="glyphicon glyphicon-share"></span> Cerrar Session
          </a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="well">
          <div>
            <? echo form_open('perfil/index',$att);?>
            <fieldset>
              <legend>Configuraci&oacute;n de datos personales</legend>
              <?
              if (isset($success)) {
                echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> '.$success.'</a>.</div>';
              }
              ?>
              <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Usuario</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $username;?>" disabled>
                  <p class="help-block">Este campo no puede ser modificado ya que es un referente primordial para sus transacciones.</p>
                </div>
              </div>
              <div class="form-group">
                <label for="nombres" class="col-lg-2 control-label">Nombres</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="nombres" name="nombres" placeholder="<?php echo $nombres;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="apellidos" class="col-lg-2 control-label">Apellidos</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="<?php echo $apellidos;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="telefono" class="col-lg-2 control-label">Telefono</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="<?php echo $telefono;?>">
                </div>
              </div>
              <div class="form-group">
                <label for="dni" class="col-lg-2 control-label">Dni</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="dni" name="dni" placeholder="<?php echo $dni;?>">
                </div>
              </div>
              <div class="form-group">
            <label for="direccion" class="col-lg-2 control-label">Tu foto:</label>
            <div class="col-lg-10">
              <img src="<?=base_url()?>uploads/<?=$thumb?>" class="img-thumbnail">
              <input id="userfile" class="form-control" type="file" name="userfile" size="20" />
            </div>
            <div id="img_profile"></div>
          </div>
              <div class="alert alert-dismissable alert-danger">
                <strong>Atencion!</strong>Para cerciorarnos que no haigan modificaciones ilicitas en nuestro servidor, debe ingresar su clave en el siguiente formulario.
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Password</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="password" name="password" >
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-5 col-lg-offset-2">
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
</div>

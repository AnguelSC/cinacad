<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
          <a href="<?php echo base_url();?>" class="list-group-item">
            <span class="glyphicon glyphicon-home"></span>Principal
          </a>
          <a href="<?php echo base_url()?>perfil/" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Datos Personales
          </a>
          <a href="#" class="list-group-item active"><span class="glyphicon glyphicon-time"></span> Reservaciones
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
            <? echo form_open('venta/process',$att);?>
            <fieldset>
              <legend>Reservaci&oacute;n de departamento</legend>
              <?
              if (isset($success)) {
                echo '<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button><strong>Well done!</strong> '.$success.'</a>.</div>';
              }
              ?>
              <div class="form-group">
                <label for="edificio" class="col-lg-2 control-label">Edificio</label>
                <div class="col-lg-10">
                  <select class="form-control" id="edificio" name="edificio">
                    <option value"---">-------</option>
                    <? foreach ($local->result() as $row): ?><option value="<?=$row->id?>"><?=$row->Nombre?></option>

                  <? endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                Solo disponibles
                <label for="departamento" class="col-lg-2 control-label">Departamento</label>
                <div class="col-lg-4">
                  <select class="form-control" id="departamento" name="departamento" disabled>
                    <option>Elija un edificio</option>
                  </select>
                </div>
              </div>
              <hr>
              <p class="text-right" id="precio_edificio">0000</p>
              <legend>Servicio</legend>
              <div id="suministros">
              </div>
              <hr>

              <div class="alert alert-dismissable alert-danger">
                <strong>Atencion!</strong>
                <ul>
                  <li>Para cerciorarnos que no haigan modificaciones ilicitas en nuestro servidor, debe ingresar su clave en el siguiente formulario.</li>
                  <li>Una vez enviado el formulario se le generar&aacute; un recibo , el cual se le ser&aacute; enviado a su correo.</li>
                </ul>
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
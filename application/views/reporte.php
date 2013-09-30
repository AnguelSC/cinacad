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
          <a href="#" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Reportar
          </a>
          <a href="<?php echo base_url()?>auth/logout/" class="list-group-item  active"><span class="glyphicon glyphicon-share"></span> Cerrar Session
          </a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="well">
          <div>
            <? echo form_open('email/send_mail',$att);?>
            <fieldset>
              <legend>Reportar</legend>
              <div class="form-group">
                <label for="name" class="col-lg-2 control-label">SU Nombre</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="name" name="name" placeholder="">

                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">email</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="">
                </div>
              </div>
              <div class="form-group">
                <label for="message" class="col-lg-2 control-label">message</label>
                <div class="col-lg-10">
                  <textarea id="message" name="message" class="form-control"></textarea>
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

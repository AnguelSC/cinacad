<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
      	<div class="well">
          <?php echo validation_errors('torres/editar/','<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>','</div>'); ?>
         <?if (isset($success)) {
           echo'<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Cambios realizados satisfactoriamente <a href="'.base_url().'torres" class="btn btn-danger btn-xs" title="">Ver todos</a></div>';
         }?>
         <? echo form_open('usuarios/nuevo/',$att);?>
            <fieldset>
              <legend>Nuevo Usuario</legend>
              <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Codigo:</label>
                <div class="col-lg-10">
                	<div class="col-lg-10">
                  		<input type="text" class="form-control" id="username" name="username" placeholder="Codigo de acceso">

                  		<div id="result_user"></div>
                  	</div>
                  	<button id="verifica_usuario" class="btn btn-info">Verificar</button>	
                  
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Clave:</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="password" name="password">
                </div>
              </div>
              <div class="form-group">
              	<div class="col-lg-10 col-lg-offset-2">
              		<div class="pass"></div>
              	<button id="new_pass" class="btn btn-success ">Generar Clave</button>
              	<button id="new_pass_2" class="btn btn-danger ">M&aacute;s segura</button>
              </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Correo electronico">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <a href="<?=base_url();?>torres"class="btn btn-default" title="">Cancel</a>
                  <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
              </div>
            </fieldset>
          <? echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>

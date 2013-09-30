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
         <? echo form_open('usuarios/editar/',$att);?>
            <fieldset>
              <legend>Editar Usuario</legend>
              <div class="form-group">
                <label for="username" class="col-lg-2 control-label">Codigo:</label>
                <div class="col-lg-10">
                		<select class="chosen-select col-lg-2 control-label" id="username" name="username" style="max-width: 350px">
                      <?php foreach ($users->result() as $row): ?>
                      <?php if ($row->admin!=1): ?>
                        <option value="<?=$row->username?>"><?=$row->username?></option>
                      <?php endif ?>
                      <?php endforeach ?>
                    </select>             
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="col-lg-2 control-label">Clave:</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" id="password" name="password" disabled>
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-lg-2 control-label">Email:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="email" name="email" placeholder="Correo electronico">
                </div>
              </div>
              <div class="form-group">
                <label for="baneado" class="col-lg-3 control-label">Baneado</label>
                <div class="col-lg-9">
                  <div id="animated-switch" class="make-switch" data-animated="true" data-on="success" data-off="danger"  data-on-label="SI" data-off-label="NO">
                    <input type="checkbox" id="baneado" name="baneado">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
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

<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
      	<div class="well">
          <?php echo validation_errors('torres/notificar/','<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>','</div>'); ?>
         <?if (isset($success)) {
           echo'<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Cambios realizados satisfactoriamente <a href="'.base_url().'torres" class="btn btn-danger btn-xs" title="">Ver todos</a></div>';
         }?>
         <? echo form_open('usuarios/notificar/',$att);?>
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
                <label for="mensaje" class="col-lg-2 control-label">Mensaje:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Correo electronico">
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

<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
        <h2>Torre: <?=$torre->Nombre?></h2>
        <div class="well">
          <?php echo validation_errors('torres/editar/'.$torre->id,'<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>','</div>'); ?>
         <?if (isset($success)) {
           echo'<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Cambios realizados satisfactoriamente <a href="'.base_url().'torres" class="btn btn-danger btn-xs" title="">Ver todos</a></div>';
         }?>
         <? echo form_open('torres/editar/'.$torre->id,$att);?>
            <fieldset>
              <legend>Modificar</legend>
              <div class="form-group">
                <label for="nombre" class="col-lg-2 control-label">Nombre:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$torre->Nombre?>">
                </div>
              </div>
              <div class="form-group">
                <label for="precio" class="col-lg-2 control-label">Precio:</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="precio" name="precio" value="<?=$torre->precio?>">
                </div>
              </div>
              <div class="form-group">
                <label for="dpto" class="col-lg-2 control-label">N° de dptos(<abbr title="inicial">i</abbr>):</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="dpto" name="dpto" value="<?=$torre->dpto?>">
                </div>
              </div>
              <div class="form-group">
                <label for="dpto_f" class="col-lg-2 control-label">N° de dptos:(<abbr title="final">f</abbr>)</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="dpto_f" name="dpto_f" value="<?=$torre->dpto_f?>">
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

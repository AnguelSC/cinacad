<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
<div class="panel panel-default">
  <div class="panel-heading">Zonas</div>
  <div class="panel-body">
    <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label">Seleccione:</label>
        <div class="col-lg-10">
          <select class="form-control" id="suministro_edi" name="suministro_edi">
            <option>---</option>
            <? foreach ($torres->result() as $row): ?><option value="<?=$row->id?>"><?=$row->Nombre?></option>
          <? endforeach;?>
          </select>
        </div>
      </div>
  </div>
<table class="table table-hover">
<thead>
  <tr>
    <th>#</th>
    <th>Nombre</th>
    <th>Zona</th>
    <th>Precio</th>
  </tr>
</thead>
<tbody>    
  <?//foreach ($torres->result() as $row) :?>

<? //endforeach;?>
</tbody>
</table>
        </div>
        <div class="panel panel-default">
  <div class="panel-heading">Agrega nuevo suministro</div>
  <div class="alert alert-danger">
    <strong>Oh snap!</strong>
    <ul>
      <li>Para poder agregar un suministro a una torre, debe tenerla activa</li>
    </ul>
  </div>
  <div class="panel-body">
    <? echo form_open('suministros/nuevo/',$att);?>
    <fieldset>
      <legend>Modificar</legend>
      <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label">Nombre:</label>
        <div class="col-lg-10">
          <select class="form-control" id="edificio" name="edificio">
            <? foreach ($torres->result() as $row): ?><option value="<?=$row->id?>"><?=$row->Nombre?></option>

          <? endforeach;?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="nombre" class="col-lg-2 control-label">Nombre:</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ingrese nombre de suministro">
        </div>
      </div>
      <div class="form-group">
        <label for="precio" class="col-lg-2 control-label">Precio:</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="precio" name="precio" placeholder="ingrese precio del suministro">
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
</div>

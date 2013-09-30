<div class="container">
  <div class="bs-docs-section">

    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
<div class="panel panel-default">
  <div class="panel-heading">Zonas</div>
  <div class="panel-body">
    <a href="<?php echo base_url();?>torres/" title="" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-plus"></span> <strong>Agregar</strong></a>
  </div>
  <div>
<table class="table table-hover">
<thead>
  <tr>
    <th>#</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Estado</th>
    <th>N° de dptos</th>
    <th></th>
  </tr>
</thead>
<tbody>    
  <?foreach ($torres->result() as $row) :?>
      <tr>
        <td><?=$row->id?></td>
        <td><?=$row->Nombre?></td>
        <td><?=$row->precio?></td>
        <td><?=($row->activo==1)?'Activo':'Inactivo';?></td>
        <td><?=$row->dpto?> al <?=$row->dpto_f?></td>
        <td><a href="<?php echo base_url();?>torres/editar/<?=$row->id?>" title="" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span></a></td>
      </tr>
<? endforeach;?>
</tbody>
</table>
  </div>
        </div>
      </div>
    </div>
  </div>
</div>

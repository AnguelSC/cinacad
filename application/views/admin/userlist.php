<div class="modal fade" id="usuarios_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="nombre">Modal title</h4>
        </div>
        <div class="modal-body">
<div class="row">
  <div class="col-lg-3"><div id="thumb"></div></div>
  <div class="col-lg-5">
<dl>
  <dt>Nombres:</dt>
  <dd id="nombre">...</dd>
  <dt>Identificador:</dt>
  <dd id="username">...</dd>
  <dt>DNI:</dt>
  <dd id="dni">...</dd>
  <dt>Telefono:</dt>
  <dd id="telefono">...</dd>
  <dt>Direccion:</dt>
  <dd id="direccion">...</dd>
</dl>
  </div>
</div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
        <h2>Listado de usuarios</h2>
        <div class="well">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Email</th>
      <th>Banned</th>
    </tr>
  </thead>
  <tbody>
<?foreach($results as $data):?>
<?php if ($data->admin!=1): ?>
    <tr>
    <td><?=$data->id?></td>
    <td><a data-toggle="modal" id="<?=$data->id?>" href="#usuarios_modal"><?=$data->username?></a></td>
    <td><?=$data->email?></td>
    <td><?echo  $data->id==0?'Baneado':'Normal';?></td>
  </tr>
<?php endif ?>
<?endforeach;?>
</tbody>
</table>
<?if ($links):?>
<ul class="pagination pagination-sm">
  <?php echo $links; ?>
</ul>
<?endif;?>
<a href="<?=base_url();?>excel/export/1" id="download" class="btn btn-danger" title=""> <span class="glyphicon glyphicon-download-alt"></span>Exportar XLS</a>
        </div>
      </div>
    </div>
  </div>
</div>

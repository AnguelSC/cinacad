<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
        <h2>Listado de facturas</h2>
        <div class="well">
<table class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Cliente</th>
      <th>Dep.[Edificio]</th>
      <th>Recibos</th>
    </tr>
  </thead>
  <tbody>
<?foreach($results as $data):?>

  <tr>
    <td><?=$data->id?></td>
    <td><?=$getuserprofile[$data->user_id]['nombres'];?> <span class="label label-info"><?=$getuser[$data->user_id]['username'];?></span> </td>
    <td><span class="label label-danger"><?=$data->departamento?></span> <?=$local[$data->edificio]?></td>
    <td><?=$data->total?></td>
  </tr>
<?endforeach;?>
</tbody>
</table>
<?if ($links):?>
<ul class="pagination pagination-sm">
  <?php echo $links; ?>
</ul>
<?endif;?>
<a href="<?=base_url();?>excel/export/2" id="download" class="btn btn-danger" title=""> <span class="glyphicon glyphicon-download-alt"></span>Exportar XLS</a>
        </div>
      </div>
    </div>
  </div>
</div>

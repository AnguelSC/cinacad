<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <? include('menu_admin.php');?>
      <div class="col-lg-9">
        <h2>Torres</h2>
        <div class="well">
          <div class="alert alert-danger">
        <strong>Guia!</strong>
        <ul>
           <li>Los que estan tachados son las torres inactivas.</li>
           <li>Por cuesti&oacute;n de seguridad, la activaci&oacute;n/desactivaci&oacute;n de torres se realiza manualmente una por una.</li>
         </ul> 
      </div>
      <ul class="list-group">
  <?
    foreach ($torres->result() as $row) {
      $estado = ($row->activo==0)?'checked':'';
      $act = ($row->activo==0)?' <a href="'.base_url().'torres/activa/'.$row->id.'" class="btn btn-info btn-xs">Activar</a> ':' <a href="'.base_url().'torres/desactiva/'.$row->id.'" class="btn btn-danger btn-xs">Desactivar</a> ';
      $inicio = ($row->activo==0)?'<strike>':'';
      $fin = ($row->activo==0)?'</strike>':'';
      echo '<li class="list-group-item">'.$act.$inicio.$row->Nombre.$fin."</li>";
    }
          ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

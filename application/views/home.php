<?php
function comparar_fechas($fecha, $fecha_comparar = null){
  if($fecha_comparar == null){
    $fecha_comparar = date("Y-m-d H:i:s");
    }

    $fecha = strtotime($fecha);
    $fecha_comparar = strtotime($fecha_comparar);

    if($fecha == $fecha_comparar){  
    return 0;
    }
    else if($fecha < $fecha_comparar){  
    return -1;
    }
    else if($fecha > $fecha_comparar){    
    return 1;
    }

    return false;
  }
  $hoy = date("Y-m-d H:i:s");
  ?><div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-3">
        <div class="list-group">
          <a href="#" class="list-group-item active">
            <span class="glyphicon glyphicon-home"></span> Principal
          </a>
          <a href="<?php echo base_url()?>perfil/" class="list-group-item"><span class="glyphicon glyphicon-user"></span> Datos Personales
          </a>
          <a href="<?php echo base_url()?>venta/" class="list-group-item"><span class="glyphicon glyphicon-time"></span> Reservaciones
          </a>
          <a href="#" class="list-group-item"><span class="glyphicon glyphicon-usd"></span> Cuotas
          </a>
          <a href="<?php echo base_url()?>auth/logout/" class="list-group-item  active"><span class="glyphicon glyphicon-share"></span> Cerrar Session
          </a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="well">
          <div>
            <strong>Sr(a):</strong> <?php echo $nombres." ".$apellidos;?>(<?echo $dni;?>)
          </div>
        </div>
        <ul class="list-inline">
          <li><p class="text-success"><span class="glyphicon glyphicon-stop"></span>Cuenta saldada.</p></li>
          <li><p class="text-warning"><span class="glyphicon glyphicon-stop"></span>Fecha de pago se acerca.</p></li>
          <li><p class="text-danger"><span class="glyphicon glyphicon-stop"></span>Fecha de pago venci&oacute;.</p></li>
          <li><p class="text-muted"><span class="glyphicon glyphicon-stop"></span>En tr&aacute;mite.</p></li>
        </ul>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th><abbr title="Departamento">Dpto</abbr></th>
              <th>Ubicaci&oacute;n</th>
              <th>Opciones</th>
              <th>Cuota S/.</th>
            </tr>
          </thead>
          <tbody>
            <?
            if (!$query->num_rows()) {
              echo '<tr><td colspan="4">No se encontro ningun dato</td></tr>';
            }
            foreach ($query->result() as $row):?>
            <tr <?/*if ($row->estado==0) {
              echo(comparar_fechas($hoy,$row->fecha_f)==-1)?'class="warning"':'class="danger"';
            }elseif($row->estado==1){
              echo 'class="success"';
            }else{
              echo 'class="active"';
            }*/?>>
              <td><?=$row->departamento?></td>
              <td><?=$local[$row->edificio];?></td>
              <td>
                <p class="text-center"><span class="label label-danger">Restan 7 dias</span></p>
                <div class="progress" style="margin-bottom:0;">
                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                    <span class="sr-only">40% Complete (success)</span>
                  </div>
                </div>
              </td>
              <td><??></td>
            </tr>
            <? endforeach;?>
            <tr>
              <td colspan="3"><div class="text-right">Total:</div></td>
              <td><strong>0</strong></td>
  
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
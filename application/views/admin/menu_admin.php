<div class="col-lg-3 well">
  <div class="list-group">
    <div class="list-group-item active" title="">SECCI&Oacute;N CLIENTES</div>
    <a href="<?php echo base_url();?>usuarios/nuevo" class="list-group-item" id="1_1"><span class="glyphicon glyphicon-chevron-right"></span> Registrar</a>
    <a href="<?php echo base_url();?>usuarios/editar" class="list-group-item" id="1_2"><span class="glyphicon glyphicon-chevron-right"></span> Modificar</a>
    <a href="<?php echo base_url();?>usuarios/lista" class="list-group-item" id="1_3"><span class="glyphicon glyphicon-chevron-right"></span> Listar<span class="badge"><?=$countuser?></span></a>
    <a href="<?php echo base_url();?>usuarios/notificar" class="list-group-item" id="1_4"><span class="glyphicon glyphicon-chevron-right"></span> Notificar</a>
    <a href="https://dashboard.zopim.com" class="list-group-item" id="1_5"><span class="glyphicon glyphicon-chevron-right"></span> <span class="text-danger">ATENCI&Oacute;N ONLINE</span></a>
  </div>
  <div class="list-group">
    <div class="list-group-item active" title="">SECCI&Oacute;N ZONAS</div>
    <a href="<?php echo base_url();?>torres" class="list-group-item" id="2_1"><span class="glyphicon glyphicon-chevron-right"></span> Mantenimiento de zonas</a>
    <a href="<?php echo base_url();?>torres/estado" class="list-group-item" id="2_2"><span class="glyphicon glyphicon-chevron-right"></span> Dar de baja</a>
    <a href="<?php echo base_url();?>suministros" class="list-group-item" id="2_3"><span class="glyphicon glyphicon-chevron-right"></span> Suministros</a>
  </div> 
  <div class="list-group">
    <div class="list-group-item active" title="">SECCI&Oacute;N FACTURACI&Oacute;N</div>
    <a href="#" class="list-group-item" id="3_1"><span class="glyphicon glyphicon-chevron-right"></span> Registrar</a>
    <a href="#" class="list-group-item" id="3_2"><span class="glyphicon glyphicon-chevron-right"></span> Modificar</a>
    <a href="<?php echo base_url();?>facturas/lista" class="list-group-item" id="3_3"><span class="glyphicon glyphicon-chevron-right"></span> Listar <span class="badge"><?=$countfac?></span></a>
    <a href="#" class="list-group-item" id="3_4"><span class="glyphicon glyphicon-chevron-right"></span> Aprobar</a>
  </div>
  <div class="list-group">
    <div class="list-group-item active" title="">SECCI&Oacute;N RECIBOS</div>
    <a href="<?php echo base_url();?>recibos" class="list-group-item" id="4_1"><span class="glyphicon glyphicon-chevron-right"></span> Generar</a>
    <a href="#" class="list-group-item" id="4_2"><span class="glyphicon glyphicon-chevron-right"></span> Modificar</a>
    <a href="<?php echo base_url();?>facturas/lista" class="list-group-item" id="4_3"><span class="glyphicon glyphicon-chevron-right"></span> Listar</a>
    <a href="#" class="list-group-item" id="4_4"><span class="glyphicon glyphicon-chevron-right"></span> Aprobars</a>
  </div>
</div>
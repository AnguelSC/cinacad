<div class="container">
  <div class="bs-docs-section">
<div class="row">
  <? include('menu_admin.php');?>
<div class="col-lg-9">
<div class="row">
<div class="col-lg-4">
<div class="well">
<form class="bs-example form-horizontal">
<div class="form-group">
  <label for="nombre" class="col-lg-3 control-label">Codigo:</label>
  <div class="col-lg-12">
    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese codigo de recibo" autocomplete="off">
  </div>
</div>
<div class="form-group">
  <label for="zona" class="col-lg-3 control-label">Zona:</label>
  <div class="col-lg-12">
    <select class="form-control" id="zona">
      <option>---</option>
      <? foreach ($torres->result() as $row): ?><option value="<?=$row->id?>"><?=$row->Nombre?></option>
    <? endforeach?>
    </select>
  </div>
</div>
<div class="form-group">
  <label for="depa" class="col-lg-3 control-label">Departamento:</label>
  <div class="col-lg-12">
    <select class="form-control" id="depa">
    </select>
  </div>
</div>
<div class="form-group">
  <label for="mes" class="col-lg-3 control-label">Mes:</label>
  <div class="col-lg-12">
    <select class="form-control" id="mes">
      <option>ENERO</option>
      <option>FEBRERO</option>
      <option>MARZO</option>
      <option>ABRIL</option>
      <option>MAYO</option>
      <option>JUNIO</option>
      <option>JULIO</option>
      <option>AGOSTO</option>
      <option>SEPTIEMBRE</option>
      <option>OCTUBRE</option>
      <option>NOVIEMBRE</option>
      <option>DICIEMBRE</option>
    </select>
  </div>
</div>
</form>
</div>
</div>
<div class="col-lg-8">
<div class="panel  panel-primary">
<div class="panel-heading">Previsualiza el recibo</div>
<div>
<table  class="table table-bordered" id="recibo" width="800" border="0">
  <tr>
    <th colspan="6" scope="col"><h4 align="center">COMPROBANTE DE PAGO</h4></th>
  </tr>
  <tr>
    <th colspan="6"><h5 align="center"  id="zona" style="text-transform: uppercase;">CONDOMINIO LOS PARQUES DE VILLA EL SALVADOR</h5></th>
  </tr>
  <tr>
    <th colspan="6"><h6 align="center">Av. 1ro. De Mayo    S/N - Villa el Salvador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Telf.    719-2834&nbsp;</h6></th>
  </tr>
  <tr>
    <th width="166">MES:</th>
    <th colspan="2" id="mes">mes</th>
    <td width="158">&nbsp;</td>
    <td colspan="2" >CODIGO:</td>
  </tr>
  <tr>
    <th>A&Ntilde;O:</th>
    <td colspan="2" id="año">2013</td>
    <td>&nbsp;</td>
    <td colspan="2" id="codigo">000000</td>
  </tr>
  <tr>
    <th colspan="6">&nbsp;</th>
  </tr>
  <tr>
    <th colspan="2">PROPIETARIO:</th>
    <td colspan="4" id="propietario" style="text-transform: uppercase;"> nombre de la persona </td>
  </tr>
  <tr>
    <th>EDIFICIO:</th>
    <td width="43" id="zona_id">000</td>
    <td colspan="2">&nbsp;</td>
    <td width="156">DEPARTAMENTO:</td>
    <td width="118" id="departamento">000</td>
  </tr>
  <tr>
    <th colspan="2"><img width="150" height="202" src="<?php echo base_url()?>componentes/img/logo.jpg" /></th>
    <td colspan="4">aca van los suministros</td>
  </tr>
  <tr>
    <th><strong></strong>F.Emic:</th>
    <td colspan="2">00/00/00</td>
    <td><strong>F.Venc:</strong></td>
    <td colspan="2">00/00/00</td>
  </tr>
  <tr>
    <th colspan="5">CANCELAR     en   el   Banco   Continental   e  indicar  su   CODIGO</th>
    <td><strong id="codigo">00000</strong></td>
  </tr>
  <tr>
    <th colspan="6">
      a la CTA. 0011-0508-02-00039949  a nombre de los Sres. Lenny Sellerico/Pedro Prieto, debera presentar su voucher en la oficina de administracion o enviar al correo parquesdevilla@cinadsac.com para el respectivo control.   EN CASO DE NO HEBER CANCELADO O ACREDITADO SU PAGO LAMENTABLEMENTE EL DIA 06 DE SEPTIEMBRE  SE LE CORTARA EL SUMINISTRO DE AGUA.
    </th>
  </tr>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
  </div>
</div>

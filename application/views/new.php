<div class="container">
  <div class="bs-docs-section">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms">Bienvenido</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
         <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Primeros pasos en CINAD</h4>
        </div>
        <div class="modal-body">
          <form id="custom"action="process" method="post" accept-charset="utf-8" enctype="multipart/form-data" class="bs-example form-horizontal">
          
        <fieldset title="Paso 1">
          <legend>Datos personales</legend>
          <div class="form-group">
            <label for="nombres" class="col-lg-2 control-label">Nombres</label>
            <div class="col-lg-9">
              <input type="text" class="form-control  input-sm" id="nombres" name="nombres" placeholder="Ingrese sus nombres">
            </div>
          </div>
          <div class="form-group">
            <label for="apellidos" class="col-lg-2 control-label">Appellidos</label>
            <div class="col-lg-9">
              <input type="text" class="form-control  input-sm" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos">
            </div>
          </div>
          <div class="form-group">
            <label for="dni" class="col-lg-2 control-label">DNI</label>
            <div class="col-lg-9">
              <input type="text" class="form-control  input-sm" id="dni" name="dni" placeholder="Ingrese su DNI">
            </div>
          </div>
          <!-- Disabled fields are not validated.  -->
        </fieldset>

        <fieldset title="Paso 2">
          <legend>Datos de contacto</legend>
          <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-9">
              <input type="text" class="form-control  input-sm" id="email" name="email" placeholder="Ingrese su email">
            </div>
          </div>
          <div class="form-group">
            <label for="telefono" class="col-lg-2 control-label">Telefono/cel</label>
            <div class="col-lg-9">
              <input type="text" class="form-control  input-sm" id="telefono" name="telefono" placeholder="Ingrese su telefono">
            </div>
          </div>
          <div class="form-group">
            <label for="direccion" class="col-lg-2 control-label">Direccion</label>
            <div class="col-lg-9">
              <input type="text" class="form-control  input-sm" id="direccion" name="direccion" placeholder="Ingrese su direccion">
            </div>
          </div>
        </fieldset>
        <fieldset title="paso 3">
        <legend>Cambio de contraseña</legend> 
        <span class="label label-danger">Puede omitir este paso si desea mantener la clave que le gener&oacute; el sistema</span>
        <div class="form-group">
          <label for="password" class="col-lg-2 control-label">Password</label>
          <div class="col-lg-9">
            <input type="password" class="form-control  input-sm" id="password" name="password" placeholder="Ingrese su password">
          </div>
        </div>
        <div class="form-group">
          <label for="re-passw" class="col-lg-2 control-label">Re-passw:</label>
          <div class="col-lg-9">
            <input type="password" class="form-control  input-sm" id="re-passw" name="re-passw" placeholder="Ingrese su password">
          </div>
        </div>
        </fieldset>
        <fieldset title="Paso 4">

          <legend>Perfil y otros</legend>
          <div class="form-group">
            <label for="direccion" class="col-lg-2 control-label">Tu foto:</label>
            <div class="col-lg-9">
              <input id="userfile" class="form-control" type="file" name="userfile" size="20" />
            </div>
            <div id="img_profile"></div>
          </div>
        </fieldset>
  
        <input type="submit" id="final" class="finish btn-btn-danger" value="Finish!"/>
      </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
       
      </div>
    </div>
  </div>
</div>

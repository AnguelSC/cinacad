    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>componentes/js/bootstrap.js" ></script>
	<script type="text/javascript" src="<?php echo base_url();?>componentes/js/bootstrap-switch.js" ></script>
	 <script type="text/javascript" src="<?php echo base_url();?>componentes/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>componentes/js/jquery.stepy.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>componentes/js/jquery.form.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>componentes/js/ajaxfileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>componentes/js/ajaxfileupload.js"></script>
  <script type="text/javascript" src="<?php echo base_url();?>componentes/js/chosen.jquery.js"></script>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

  <!--Start of Zopim Live Chat Script-->
  
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?1XpSIs4lkrDC1n5oU7j3MyrPfGzeDBjQ';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->
<script>
$('#edificio').change(function(){
	console.log($(this).val());

	$.ajax({ // create an AJAX call...
      data: {edificio:$('#edificio').val()}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/venta/buscadep/", // the file to call
      dataType: 'html',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="30px">');
      },
      success: function(response) { // on success..
         $('#departamento').html(response);
         console.log(response);
      }
  	});
  $.ajax({ // create an AJAX call...
      data: {edificio:$('#edificio').val()}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/venta/buscaprecio/", // the file to call
      dataType: 'html',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="30px">');
      },
      success: function(response) { // on success..
        $('#departamento').removeAttr("disabled");
        $('#precio_edificio').html(response);

      }
    });
  $.ajax({ // create an AJAX call...
      data: {edificio:$('#edificio').val()}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/venta/buscasuministros/", // the file to call
      dataType: 'html',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="30px">');
      },
      success: function(response) { // on success..
        $('#suministros').html(response);

      }
    });
});
$('#userfile').change(function(){
  

      $.ajaxFileUpload({
         url         :'http://127.0.0.1/2013/condominio/perfil/do_upload/', 
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
            'userfile'           : $('#userfile').val()
         },
         success  : function (data)
         {
        $('#img_profile').html('<center><img src="uploads/'+ data.msg + '" class="img-thumbnail"></center>');
        console.log(data);
         }
      });
});
$('#suministro_edi').change(function(){
  console.log($(this).val());

  $.ajax({ 
      data: {suministro_edi:$('#suministro_edi').val()}, 
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/suministros/busca_edi", 
      dataType: 'html',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="30px">');
      },
      success: function(response) { // on success..
         $('tbody').html(response);
         console.log(response);
      }
    });
});
$('select#mes').change(function(){$('th#mes').html($(this).val());});
$('select#propietario').change(function(){});
$('select#zona').change(function(){
  $('h5#zona').html($('#zona option:selected').text());
  $('#zona_id').html($(this).val());
  $.ajax({ // create an AJAX call...
      data: {edificio:$(this).val()}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/recibos/busca_edi/", // the file to call
      dataType: 'html',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="30px">');
      },
      success: function(response) { // on success..
        $('#depa').removeAttr("disabled");
    $('#depa').html(response);
     }
    });
});
$('select#depa').change(function(){
  $('td#departamento').html($('select#depa').val());
  $.ajax({ // create an AJAX call...
      data: {edificio:$('select#zona').val(),depa:$(this).val()}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/recibos/busca_dep/", // the file to call
      dataType: 'json',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="30px">');
      },
      success: function(response) { // on success..
        console.log(response.dep);
        $('td#propietario').html(response.nombre.nombres+' '+response.nombre.apellidos);
        console.log(response.nombre);
     }
    });
});
$('input#codigo').keyup(function(){var dato = $(this).val(); if(dato.length<11)$('td#codigo').html(dato);$('strong#codigo').html(dato);});

$('[href="#usuarios_modal"]').click(function(e) {
  e.preventDefault();
  $.ajax({ // create an AJAX call...
      data: {user_id:$(this).attr('id')}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/usuarios/ver/"+$(this).attr('id'), // the file to call
      dataType: 'json',
      beforeSend: function(response){
        $('.checkuser').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="20px">');
      },
      success: function(response) { // on success..
        $('#nombre').html(response.nombres+' '+response.apellidos);
        $('#thumb').html('<img class="img-thumbnail" src="http://127.0.0.1/2013/condominio/uploads/'+response.thumb+'">');
        $('dd#nombre').html(response.nombres+' '+response.apellidos);
        $('#dni').html(response.dni);
        $('#username').html(response.username);
        $('#telefono').html(response.telefono);
        $('#direccion').html(response.direccion);
     }
    });
});
$.extend({ 
  password: function (length, special) {
  var iteration = 0;
  var password = "";
  var randomNumber;
  if(special == undefined){
    var special = false;
  }
  while(iteration < length){
    randomNumber = (Math.floor((Math.random() * 100)) % 94) + 33;
    if(!special){
      if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
      if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
      if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
      if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
    }
    iteration++;
    password += String.fromCharCode(randomNumber);
  }
  return password;
  }
});

$('#new_pass').click(function(){
  var pass = $.password(8);
   $('#password').val(pass);
   $('.pass').html('<div class="alert alert-success">Nueva clave: <strong> '+ pass +'</strong></div>');
   return false;
});
$('#new_pass_2').click(function(){
  var pass = $.password(12,true);
   $('#password').val( pass);
   $('.pass').html('<div class="alert alert-danger">Nueva clave m&aacute;s segura: <strong> '+ pass +'</strong></div>');
   return false;
});

$('#verifica_usuario').click(function(){
  var dato = $("#username").val();
  if (dato.length >1) {
  $.ajax({ // create an AJAX call...
      data: {username:dato}, // get the form data
      type: "POST",
      url: "http://127.0.0.1/2013/condominio/usuarios/check_user", // the file to call
      beforeSend: function(response){
        $('#result_user').html('<img src="http://www.goodleads.com/content/styles/images/preloader.gif" width="20px">');
      },
      success: function(response) { // on success..
        if (response==0) {
          $('#result_user').html('<div class="alert alert-success"> <strong>Bien codigo disponible</strong></div>');
        }else{
          $('#result_user').html('<div class="alert alert-danger"> <strong>Codigo en uso</strong></div>');
        };
      
     }
    });
  };
  return false;
});

</script>
<script type="text/javascript">
var page = $('#page').val();
$('#'+page).addClass("active");
    $(function() {

      $('#default').stepy();

      $('#custom').stepy({
        backLabel:  'Anterior',
        block:    true,
        errorImage: true,
        nextLabel:  'Siguiente',
        titleClick: true,
        validate: true
      });

      $('div#step').stepy({
        finishButton: false
      });

      // Optionaly
      $('#custom').validate({
        errorPlacement: function(error, element) {
          $('#custom div.stepy-error').append(error);
        }, rules: {
          'user':     { maxlength: 1 },
          'email':    'email',
          'nombres':    'required',
          'apellidos': 'required',

          'bio':      'required',
          'day':      'required'
        }, messages: {
          'user':     { maxlength: 'User field should be less than 1!' },
          'email':    { email:   'Invalid e-mail!' },
          'nombres':    { required:  'Ingrese sus nombres' },
          'newsletter': { required:  'Newsletter field is required!' },
          'bio':      { required:  'Bio field is required!' },
          'day':      { required:  'Day field is requerid!' },
        }
      });

      $('#callback').stepy({
        back: function(index) {
          alert('Going to step ' + index + '...');
        }, next: function(index) {
          if ((Math.random() * 10) < 5) {
            alert('Invalid random value!');
            return false;
          }

          alert('Going to step ' + index + '...');
        }, select: function(index) {
          alert('Current step ' + index + '.');
        }, finish: function(index) {
          alert('Finishing on step ' + index + '...');
        }, titleClick: true
      });

      $('#target').stepy({
        description:  false,
        legend:     false,
        titleClick:   true,
        titleTarget:  '#title-target',
      });

    });
    $('#myModal').modal({
      
      keyboard: true,
      backdrop: false,
    });
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
    </body>
</html>
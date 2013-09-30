<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<div class="container">
	<div class="bs-docs-section">
		<div class="row">
	      <div class="col-lg-12">
	        <div class="page-header">
	          <center><img src="<?php echo base_url()?>componentes/img/logo.jpg" alt=""></center>
	        </div>
	      </div>
	    </div>
<div class="row">
	<div class="col-lg-6">
		<div class="well">
		  <?php echo form_open($this->uri->uri_string(),$att); ?>
		    <fieldset>
		      <div class="form-group">
		        <label for="login" class="col-lg-2 control-label">Email or login</label>
		        <div class="col-lg-9">
		          <input type="text" class="form-control" id="login" name="login" maxlength="80" placeholder="login">
		          <?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
		        </div>
		      </div>
		      <div class="form-group">
		        <label for="password" class="col-lg-2 control-label">Password</label>
		        <div class="col-lg-9">
		          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
		          <?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?>
		        </div>
		      </div>
			<table>
	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<tr>
		<td colspan="2">
			<div id="recaptcha_image"></div>
		</td>
		<td>
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</td>
	</tr>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<tr>
		<td colspan="3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</td>
	</tr>
	<tr>
		<td><?php echo form_label('Confirmation Code', $captcha['id']); ?></td>
		<td><?php echo form_input($captcha); ?></td>
		<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
	</tr>
	<?php }
	} ?>	
</table>
<div class="form-group">
<div class="col-lg-9 col-lg-offset-2">
	<a href="" title="">¿Olvid&oacute; su clave?</a>
</div>
</div>
<div class="form-group">
<div class="col-lg-9 col-lg-offset-2">
  <button type="submit" class="btn btn-primary">Submit</button> 
  <a href="<?php echo base_url();?>/privado/" title="" class="btn btn-danger">IR ADMINISTRADOR</a>
</div>
</div>
</fieldset>
<?php echo form_close(); ?>

</div>

</div><div class="row">
<div class="col-lg-6">
	<div class="well">
		<h1>¿A&uacute;n no tienes una cuenta?</h1>
		<h4>No esperes m&aacute;s,ya puedes registrarte totalmente gratis.</h4>
		<a href="" class="btn btn-danger btn-lg btn-block " title="">Registrarme!</a>
	</div>
</div>
</div>
</div>



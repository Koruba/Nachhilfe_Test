<html>
<head>
<title>Registration</title>

<style type="text/css">
	
form li {
	list-style:none;
}
	
</style>
</head>
<body>
	<h1>Registration</h1>
	
	<p>Bitte geben Sie die Informationen unten ein.</p>
	
<?php
	
	$this->load->helper('form');
	
	echo form_open('user/register');

	$email = array(
		'name'		=>		'email',
		'id' 		=> 		'email',
		'value'		=> 		set_value('email')
	);
	
	$firstname = array(
		'name'		=>		'firstname',
		'id' 		=> 		'firstname',
		'value'		=> 		set_value('firstname')
	);
	
	$lastname = array(
		'name'		=>		'lastname',
		'id' 		=> 		'lastname',
		'value'		=> 		set_value('lastname')
	);
	
	$class = array(
		'name'		=>		'class',
		'id' 		=> 		'class',
		'value'		=> 		set_value('class')
	);
	
	$password = array(
		'name'		=>		'password',
		'id' 		=> 		'password',
		'value'		=> 		''
	);
	
	$confirm_password = array(
		'name'		=>		'confirmpassword',
		'id' 		=> 		'confirmpassword',
		'value'		=> 		''
	);

?>
	
<ul>
	
	<li>
	<label>E-Mail Adresse</label>
	<div>
		<?php echo form_input($email); ?>
	</div>	
	</li>
	
	<li>
	<label>Vorname</label>
	<div>
		<?php echo form_input($firstname); ?>
	</div>	
	</li>
	
	<li>
	<label>Nachname</label>
	<div>
		<?php echo form_input($lastname); ?>
	</div>	
	</li>
	
	<li>
	<label>Klasse</label>
	<div>
		<?php echo form_input($class); ?>
	</div>	
	</li>
	
	<li>
	<label>Passwort</label>
	<div>
		<?php echo form_password($password); ?>
	</div>	
	</li>
	
	<li>
	<label>Passwort bestätigen</label>
	<div>
		<?php echo form_password($confirm_password); ?>
	</div>	
	</li>
	
	<li>
		<?php echo validation_errors(); ?>
	</li>
	
	<li>
		<div>
			<?php echo form_submit(array('name' => 'register'), 'Register'); ?>
		</div>	
	</li>
</ul>

<?php echo form_close(); ?>

</body>
</html>
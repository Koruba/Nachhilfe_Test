<?php
if ($error == TRUE)
{
?>	
	<h1 style="color: red;">Fehler!</h1>
	<p><?php echo $error_message; ?></p>
<?php
}
else {
	?>
	<h1>Erfolg!</h1>
	<p>Ihr Kurs wurde erfolgreich gebucht.</p>
	<?php
}
?>
<br />
<form>
	<input type="button" value="Zur&uuml;ck zur &Uuml;bersicht" class="button general center" onclick="window.location.href='<?php echo base_url().'index.php/'; ?>'">
</form>
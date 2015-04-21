<?php
if ($error == TRUE)
{
?>	
	<h1 style="color: red;">Fehler!</h1>
	<p><?php echo $error_message; ?></p>
	<form>
		<input type="button" value="Zurueck zur Uebersicht" onclick="window.location.href='<?php echo base_url().'index.php/'; ?>'">
	</form>
<?php
}
else {
	?>
	<h1>Erfolg!</h1>
	<p>Ihr Kurs wurde erfolgreich gebucht.</p>
	<form>
		<input type="button" value="Zurueck zur Uebersicht" onclick="window.location.href='<?php echo base_url().'index.php/'; ?>'">
	</form>
	<?php
}
?>
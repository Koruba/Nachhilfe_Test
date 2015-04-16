<?php
if ($error == TRUE)
{
?>	
	<h1>Fehler</h1>
	<p>Sie haben diesen Kurs bereits gebucht</p>
	<form>
		<input type="button" value="Zurueck zur Uebersicht" onclick="window.location.href='<?php echo base_url().'/index.php/'; ?>'">
	</form>
<?php
}
else {
	?>
	<h1>Erfolg!</h1>
	<p>Ihr Kurs wurde erfolgreich gebucht.</p>
	<form>
		<input type="button" value="Zurueck zur Uebersicht" onclick="window.location.href='<?php echo base_url().'/index.php/'; ?>'">
	</form>
	<?php
}
?>
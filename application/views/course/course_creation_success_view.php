<h1>Erfolgreich!</h1>
<br />
<?php
	echo "Der Kurs wurde erfolgreich erstellt. Der Kurs muss erst von einem Administrator freigeschaltet werden, bevor er in der Liste angezeigt wird und von Schülern gebucht werden kann.";
?>
<br />
<br />
<form>
	<input type="button" value="Zur&uuml;ck zur &Uuml;bersicht" class="button general center" onclick="window.location.href='<?php echo base_url().'index.php/'; ?>'">
</form>
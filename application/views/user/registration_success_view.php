<h1>Erfolgreich!</h1>
<br />
<?php
	echo "Der Account mit der E-Mail ".$email." wurde erfolgreich erstellt. Der Account muss erst freigeschaltet werden, bevor Sie sich damit einloggen können.";
?>
<br />
<br />
<form>
		<input type="button" class="button general center" value="Zurueck zur Uebersicht" onclick="window.location.href='<?php echo base_url().'/index.php/'; ?>'">
</form>
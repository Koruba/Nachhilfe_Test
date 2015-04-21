<h1>Erfolgreich!</h1>
<br />
<?php
	echo "Der Account mit der E-Mail ".$email." wurde erfolgreich erstellt. Der Account muss erst freigeschaltet werden, bevor man sich damit einloggen kann.";
?>
<br />
<br />
<form>
		<input type="button" value="Zurueck zur Uebersicht" onclick="window.location.href='<?php echo base_url().'/index.php/'; ?>'">
</form>
<h1>Folgenden Sch&uuml;ler ablehnen:</h1>
<br />
<p>M&ouml;chten Sie wirklich den folgenden Sch&uuml;ler ablehnen?</p>
<table>
	<tr>
		<td>Sch&uuml;ler-Nummer</td>
		<td>Vorname</td>
		<td>Nachname</td>
		<td>Klasse</td>
	</tr>
	<tr>
		<td><?php echo $User_Data['No']; ?></td>
		<td><?php echo $User_Data['First_Name']; ?></td>
		<td><?php echo $User_Data['Last_Name']; ?></td>
		<td><?php echo $User_Data['Class']; ?></td>
	</tr>
</table>
<br />
<br />
<?php
echo form_open('admin/dismisseduser/'.$User_Data['No']);
echo form_hidden('UserNo', $User_Data['No']);
?>
<input type="submit" class="button dismiss center" value="Schüler ablehnen">
<?php
echo form_close();
?>
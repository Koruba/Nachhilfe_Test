<h1>Folgenden Schueler akzeptieren:</h1>
<br />
<p>Moechten Sie wirklich den folgenden Schueler akzeptieren.</p>
<p>Der entsprechende Schueler erhaelt die Rechte, Nachhilfekurse anzubieten und anzunehmen</p>
<table>
	<tr>
		<td>Schueler-Nummer</td>
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
echo form_open('admin/accepteduser/'.$User_Data['No']);
echo form_hidden('UserNo', $User_Data['No']);
echo form_submit('Akzeptieren', 'Akzeptieren');
echo form_close();
?>
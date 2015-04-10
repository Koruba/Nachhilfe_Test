<h1>Unbestaetigte Registrierungen:</h1>
<br />
<table>
	<tr>
		<td>Schueler-Nr.</td>
		<td>Vorname</td>
		<td>Nachname</td>
		<td>E-Mail</td>
		<td>Klasse</td>
		<td>Akzeptieren</td>
	</tr>
<?php
foreach($newUsersList as $User):		
	?>
	<tr>
		<td><?php echo $User['No']; ?></td>
		<td><?php echo $User['First_Name']; ?></td>
		<td><?php echo $User['Last_Name']; ?></td>
		<td><?php echo $User['E_Mail_Address']; ?></td>
		<td><?php echo $User['Class']; ?></td>
		<td><a href="<?php echo base_url().'/index.php/admin/accept/'.$User['No']; ?>">Akzeptieren</a></td>
	</tr>
	<?php
endforeach;
?>
</table>
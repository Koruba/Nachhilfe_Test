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
		<td><a href="<?php echo base_url().'index.php/admin/acceptuser/'.$User['No']; ?>">Schueler akzeptieren</a></td>
	</tr>
	<?php
endforeach;
?>
</table>
<br />
<br />
<h1>Unbestaetigte Kurse:</h1>
<br />
<table>
	<tr>
		<td>Kurs-Nr</td>
		<td>Kursname</td>
		<td>Fach</td>
		<td>Anbieter-Vorname</td>
		<td>Anbieter-Nachname</td>
		<td>Anbieter-Klasse</td>
		<td>Akzeptieren</td>
	</tr>
<?php
foreach($newCourseList as $Course):		
	?>
	<tr>
		<td><?php echo $Course['queryCourseNo']; ?></td>
		<td><?php echo $Course['queryCourseName']; ?></td>
		<td><?php echo $Course['queryCourseSubject']; ?></td>
		<td><?php echo $Course['queryUserFirstName']; ?></td>
		<td><?php echo $Course['queryUserLastName']; ?></td>
		<td><?php echo $Course['queryUserClass']; ?></td>
		<td><a href="<?php echo base_url().'index.php/admin/acceptcourse/'.$Course['queryCourseNo']; ?>">Kurs akzeptieren</a></td>
	</tr>
	<?php
endforeach;
?>
</table>

<h1>Unbest&auml;tigte Registrierungen:</h1>
<br />
<table>
	<tr>
		<td><b>Sch&uuml;ler-Nr.</b></td>
		<td><b>Vorname</b></td>
		<td><b>Nachname</b></td>
		<td><b>E-Mail</b></td>
		<td><b>Klasse</b></td>
		<td><b>Akzeptieren</b></td>
		<td><b>Ablehnen</b></td>
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
		<td><a href="<?php echo base_url().'index.php/admin/acceptuser/'.$User['No']; ?>">Akzeptieren</a></td>
		<td><a href="<?php echo base_url().'index.php/admin/dismissuser/'.$User['No']; ?>">Ablehnen</a></td>
	</tr>
	<?php
endforeach;
?>
</table>
<br />
<br />
<h1>Unbest&auml;tigte Kurse:</h1>
<br />
<table>
	<tr>
		<td><b>Kurs-Nr</b></td>
		<td><b>Kursname</b></td>
		<td><b>Fach</b></td>
		<td><b>Anbieter-Vorname</b></td>
		<td><b>Anbieter-Nachname</b></td>
		<td><b>Anbieter-Klasse</b></td>
		<td><b>Vorschau</b></td>
		<td><b>Akzeptieren</b></td>
		<td><b>Ablehnen</b></td>
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
		<td><a href="<?php echo base_url().'index.php/course/preview/'.$Course['queryCourseNo']; ?>">Vorschau</a></td>
		<td><a href="<?php echo base_url().'index.php/admin/acceptcourse/'.$Course['queryCourseNo']; ?>">Akzeptieren</a></td>
		<td><a href="<?php echo base_url().'index.php/admin/dismisscourse/'.$Course['queryCourseNo']; ?>">Ablehnen</a></td>
	</tr>
	<?php
endforeach;
?>
</table>

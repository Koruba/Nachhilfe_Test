<h1>Folgenden Kurs akzeptieren:</h1>
<br />
<p>Moechten Sie wirklich den folgenden Kurs akzeptieren.</p>
<p>Der entsprechende Kurs kann ab dann von allen akzeptierten Schuelern gebucht werden.</p>
<table>
	<tr>
		<td>Kurs-Nummer</td>
		<td>Kurs-Name</td>
		<td>Kurs-Fach</td>
		<td>Schueler-Vorname</td>
		<td>Schueler-Nachname</td>
		<td>Schueler-Klasse</td>
	</tr>
	<tr>
		<td><?php echo $Course_Data['queryCourseNo']; ?></td>
		<td><?php echo $Course_Data['queryCourseName']; ?></td>
		<td><?php echo $Course_Data['queryCourseSubject']; ?></td>
		<td><?php echo $Course_Data['queryUserFirstName']; ?></td>
		<td><?php echo $Course_Data['queryUserLastName']; ?></td>
		<td><?php echo $Course_Data['queryUserClass']; ?></td>
	</tr>
</table>
<br />
<br />
<?php
echo form_open('admin/acceptedcourse/'.$Course_Data['queryCourseNo']);
echo form_hidden('CourseNo', $Course_Data['queryCourseNo']);
echo form_submit('Akzeptieren', 'Akzeptieren');
echo form_close();
?>
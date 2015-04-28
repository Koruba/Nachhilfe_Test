<h1>Folgenden Kurs ablehnen:</h1>
<br />
<p>M&ouml;chten Sie wirklich den folgenden Kurs ablehnen?</p>
<table>
	<tr>
		<td>Kurs-Nummer</td>
		<td>Kurs-Name</td>
		<td>Kurs-Fach</td>
		<td>Sch&uuml;ler-Vorname</td>
		<td>Sch&uuml;ler-Nachname</td>
		<td>Sch&uuml;ler-Klasse</td>
		<td>Vorschau</td>
	</tr>
	<tr>
		<td><?php echo $Course_Data['queryCourseNo']; ?></td>
		<td><?php echo $Course_Data['queryCourseName']; ?></td>
		<td><?php echo $Course_Data['queryCourseSubject']; ?></td>
		<td><?php echo $Course_Data['queryUserFirstName']; ?></td>
		<td><?php echo $Course_Data['queryUserLastName']; ?></td>
		<td><?php echo $Course_Data['queryUserClass']; ?></td>
		<td><a href="<?php echo base_url().'index.php/course/preview/'.(string)$Course_Data['queryCourseNo']; ?>">Vorschau</a></td>
	</tr>
</table>
<br />
<br />
<?php
echo form_open('admin/dismissedcourse/'.$Course_Data['queryCourseNo']);
echo form_hidden('CourseNo', $Course_Data['queryCourseNo']);
?>
<input type="submit" class="button dismiss center" value="Kurs ablehnen">
<?php
echo form_close();
?>
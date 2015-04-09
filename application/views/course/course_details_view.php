<table>
	<tr>
		<td>Anbieter Vorname</td>
		<td>Anbieter Nachname</td>
		<td>Fach</td>
		<td>Kursname</td>
		<td>Datum Von</td>
		<td>Datum Bis</td>
	</tr>
	<tr>
		<td><?php echo $course_detail['queryUserFirstName']; ?></td>
		<td><?php echo $course_detail['queryUserLastName']; ?></td>
		<td><?php echo $course_detail['queryCourseSubject']; ?></td>
		<td><?php echo $course_detail['queryCourseName']; ?></td>
		<td><?php echo $course_detail['queryCourseDateFrom']; ?></td>
		<td><?php echo $course_detail['queryCourseDateTo']; ?></td>
	</tr>
</table>
<form>
	<input type="button" value="Buchen" onclick="window.location.href='<?php echo base_url().'/index.php/course_controller/confirmation/'.$course_detail['queryCourseNo']; ?>'">
</form>
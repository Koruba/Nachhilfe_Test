<table>
	<tr>
		<td>Anbieter Vorname</td>
		<td>Anbieter Nachname</td>
		<td>Fach</td>
	</tr>
	<tr>
		<td><?php echo $course_detail['queryUserFirstName']; ?></td>
		<td><?php echo $course_detail['queryUserLastName']; ?></td>
		<td><?php echo $course_detail['queryCourseSubject']; ?></td>
	</tr>
</table>
<form>
<input type="button" value="Buchen" onclick="window.location.href='http://localhost/Nachhilfe_Test/index.php/course_controller/confirmation/<?php echo$course_detail['queryCourseNo'] ?>'">
</form>
<h1><?php echo $course_detail['queryCourseName']; ?></h1>
<p><b>Anbieter: </b><?php echo $course_detail['queryUserFirstName'].' '.$course_detail['queryUserLastName'].'  -  '.$course_detail['queryUserClass']; ?></p>
<br />
<p><b>Zeitraum: Vom </b><?php echo $course_detail['queryCourseDateFrom']; ?><b> bis </b> <?php echo $course_detail['queryCourseDateTo']; ?></p>
<br />
<p><b>Kursbeschreibung:</b></p>
<br />
<?php echo $course_detail['queryCourseDescription']; ?>
<br />
<br />
<p><b>Zusaetzliche Informationen:</b></p>
<table>
	<tr>
		<td>Maximale Teilnehmerzahl:</td>
		<td><?php echo $course_detail['queryCourseMaximumParticipants']; ?></td>
	</tr>
	<tr>
		<td>Belegte Plaetze:</td>
		<td><?php echo $Entry_Count; ?></td>
	</tr>
	<tr>
		<td>Freie Plaetze:</td>
		<td><?php echo $course_detail['queryCourseMaximumParticipants'] - $Entry_Count; ?></td>
	</tr>
</table>
<br />
<p>Kosten fuer den Zeitraum: <?php echo $course_detail['queryCourseCost']; ?>€</p>
<br />
<form>
	<input type="button" value="Buchen" onclick="window.location.href='<?php echo base_url().'index.php/course/confirmation/'.$course_detail['queryCourseNo']; ?>'">
	<br />
	<br />
	<input type="button" value="PDF drucken" onclick="window.location.href='<?php echo base_url().'index.php/course/create_pdf'; ?>'">
</form>
<h1>Buchungsbestaetigung</h1>
<?php
	echo "Möchten sie wirklich den Kurs ".$course_detail['queryCourseName']." vom ".$course_detail['queryCourseDateFrom']." bis ".$course_detail['queryCourseDateTo']." buchen?";
?>
<br />
<br />
<form>
<input type="button" value="Wirklich buchen" class="button general center" onclick="window.location.href='<?php echo base_url().'index.php/course/confirmed/'.$course_detail['queryCourseNo']; ?>'">
</form>
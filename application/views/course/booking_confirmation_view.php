<h1>Buchungsbestaetigung</h1>
<?php
	echo "Moechten sie wirklich den Kurs ".$course_detail['queryCourseName']." vom ".$course_detail['queryCourseDateFrom']." bis ".$course_detail['queryCourseDateTo']." buchen?";
?>
<form>
<input type="button" value="Wirklich buchen" onclick="window.location.href='<?php echo base_url().'/index.php/course_controller/confirmed/'.$course_detail['queryCourseNo']; ?>'">
</form>
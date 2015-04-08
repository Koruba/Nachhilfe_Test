<h1>Buchungsbestaetigung</h1>
<?php
	echo "Moechten sie wirklich den Kurs ".$course_detail['queryCourseName']." vom ".$course_detail['queryCourseDateFrom']." bis ".$course_detail['queryCourseDateTo']." buchen?";
?>
<form>
<input type="button" value="Wirklich buchen" onclick="window.location.href='http://localhost:8080/Nachhilfe_Test/index.php/course_controller/confirmed/<?php print $course_detail['queryCourseNo']; ?>'">
</form>
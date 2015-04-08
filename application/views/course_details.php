<?php
	//error_reporting(0);
	echo "Hallo Welt".'<br />';
	echo $course_detail['queryUserFirstName'].'<br />';
	echo $course_detail['queryUserLastName'].'<br />';
	echo $course_detail['queryCourseSubject'];
	//echo $course_detail['queryCourseNo'].'<br />';
	//echo $course_detail['Instructor_No'];
?>
<form>
<input type="button" value="Buchen" onclick="window.location.href='http://localhost:8080/Nachhilfe_Test/index.php/course_controller/confirmation/<?php echo$course_detail['queryCourseNo'] ?>'">
</form>
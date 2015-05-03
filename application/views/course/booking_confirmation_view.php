<h1>Buchungsbestaetigung</h1>
<?php
	echo "Möchten sie wirklich den Kurs ".$course_detail['queryCourseName']." vom ".$course_detail['queryCourseDateFrom']." bis ".$course_detail['queryCourseDateTo']." buchen?";
?>
<br />
<br />
<?php
echo form_open('course/confirmed/'.$course_detail['queryCourseNo']);
?>
	<input type="hidden" name="booking_confirmation" value="confirmation">
	<input type="submit" value="Wirklich buchen" class="button general center"">
</form>
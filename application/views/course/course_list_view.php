<?php
if ($this->session->userdata('login') == TRUE)
{
?>
	<div class="NewCourseDiv">
		<form>
			<input type="button" value="Neuen Kurs erstellen" class="button general center" onclick="window.location.href='<?php echo base_url(); ?>index.php/course/create/'">
		</form>
	</div>
	<?php
	if ($this->session->userdata('admin') == TRUE)
	{
		?>
		<div class="AdminCenterDiv">
			<form>
				<input type="button" value="Admin Bereich" class="button general center" onclick="window.location.href='<?php echo base_url(); ?>index.php/admin/'">
			</form>
		</div>
		<?php
	}
	?>
<?php 
}
?>
<br />
<h1>Kursangebote</h1>
<br />
<br />
<?php
foreach($course_list as $Course):
?>
	<div class="CourseListEntry">
		<div class="StartCourseIcon">
			<a href="<?php echo base_url().'index.php/course/detail/'.(string)$Course['queryCourseNo']; ?>"><img src="<?= base_url()?>/images/conf.png"></a>
		</div>
		<div class="CourseInfo">
			<h2 class="CourseInfoH2"><a href="<?php echo base_url().'index.php/course/detail/'.(string)$Course['queryCourseNo']; ?>"><?php echo $Course['queryCourseName']; ?></a></h2>
			<p class="CourseInfoP"><b>Anbieter:</b> <?php echo $Course['queryUserFirstName'].' '.$Course['queryUserLastName']. ' - '.$Course['queryUserClass']; ?> <b>&nbsp;&nbsp;Fach:</b> <?php echo $Course['queryCourseSubject']; ?></p>
		</div>
		<div class="CourseDescription">
			<p><i><?php echo strip_tags(substr($Course['queryCourseDescription'],0,110)).'...'; ?> </i></p>
		</div>
	</div>
	<!--div class="FloatNone"></div-->
<?php
endforeach;
if ($this->session->userdata('login') == TRUE)
{
}
?>



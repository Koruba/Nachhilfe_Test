<h1>Meine gebuchten Kurse:</h1>
<table>
	<tr>
		<td>Kurs-Nr</td>
		<td>Fach</td>
		<td>Kurs-Name</td>
		<td>Kurs-Kosten</td>
		<td>Datum von</td>
		<td>Datum bis</td>
		<td>Detail-Link</td>
	</tr>
	<?php
	foreach($Course_Entries as $User_Course_Entry):		
		?>
		<tr>
			<td><?php echo $User_Course_Entry['queryCourseNo']; ?></td>
			<td><?php echo $User_Course_Entry['queryCourseSubject']; ?></td>
			<td><?php echo $User_Course_Entry['queryCourseName']; ?></td>
			<td><?php echo $User_Course_Entry['queryCourseCost'].'€'; ?></td>
			<td><?php echo $User_Course_Entry['queryCourseDateFrom']; ?></td>
			<td><?php echo $User_Course_Entry['queryCourseDateTo']; ?></td>
			<td><a href="<?php echo base_url().'index.php/course/detail/'.(string)$User_Course_Entry['queryCourseNo']; ?>">Details</a></td>
		</tr>
		<?php
	endforeach;
	?>
</table>
<br />
<h1>Meine angebotenen Kurse:</h1>
<table>
	<tr>
		<td>Kurs-Nr</td>
		<td>Fach</td>
		<td>Kurs-Name</td>
		<td>Kurs-Kosten</td>
		<td>Datum von</td>
		<td>Datum bis</td>
		<td>Detail-Link</td>
	</tr>
<?php 
	foreach($User_Courses as $User_Course):		
		?>
		<tr>
			<td><?php echo $User_Course['No']; ?></td>
			<td><?php echo $User_Course['Subject']; ?></td>
			<td><?php echo $User_Course['Name']; ?></td>
			<td><?php echo $User_Course['Cost'].'€'; ?></td>
			<td><?php echo $User_Course['Date_From']; ?></td>
			<td><?php echo $User_Course['Date_To']; ?></td>
			<td><a href="<?php echo base_url().'index.php/course/detail/'.(string)$User_Course['No']; ?>">Details</a></td>
		</tr>
		<?php
	endforeach;
	print '<br />';
 ?>
 </table>
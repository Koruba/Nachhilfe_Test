<table>
	<tr>
		<td>KursNr</td>
		<td>Fach</td>
		<td>Name</td>
		<td>Link</td>
	</tr>
<?php 
	foreach($course_list as $Course):
		
		$locHref = 'http://localhost:8080/Nachhilfe_Test/index.php/course_controller/course/1';		
		?>
		<tr>
			<td><?php echo $Course['No']; ?></td>
			<td><?php echo $Course['Subject']; ?></td>
			<td><?php echo $Course['Name']; ?></td>
			<td><a href="http://localhost/Nachhilfe_Test/index.php/course_controller/course/ <?php print (string)$Course['No']; ?>">Details</a></td>
		</tr>
		<?php
	endforeach;
 ?>
 </table>

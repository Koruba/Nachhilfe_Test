<table>
	<tr>
		<td>KursNr</td>
		<td>Fach</td>
		<td>Name</td>
		<td>Link</td>
	</tr>
<?php 
	foreach($course_list as $Course):		
		?>
		<tr>
			<td><?php echo $Course['No']; ?></td>
			<td><?php echo $Course['Subject']; ?></td>
			<td><?php echo $Course['Name']; ?></td>
			<td><a href="<?php echo base_url().'index.php/course/detail/'.(string)$Course['No']; ?>">Details</a></td>
		</tr>
		<?php
	endforeach;
	print '<br />';
 ?>
 </table>
 <br />
 <br />
 <p>BaseUrl: <?php echo base_url(); ?></p>
 <br />
 <br />
<?php
if ($this->session->userdata('login') == TRUE)
{
	echo "Eingeloggt: Ja";
	?>
	<br />
	<br />
	<form>
		<input type="button" value="Neuen Kurs erstellen" onclick="window.location.href='http://localhost/Nachhilfe_Test/index.php/course/create/'">
	</form>
	<?php
}
else {
	echo "Eingeloggt: Nein";
}
?>
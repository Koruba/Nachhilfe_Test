<h1>Liste aller zugelessaner Kurse</h1>
<table>
	<tr>
		<td>Kurs-Nr</td>
		<td>Fach</td>
		<td>Kurs-Name</td>
		<td>Anbieter-Nr</td>
		<td>Kurs-Kosten</td>
		<td>Datum von</td>
		<td>Datum bis</td>
		<td>Detail-Link</td>
	</tr>
<?php 
	foreach($course_list as $Course):		
		?>
		<tr>
			<td><?php echo $Course['No']; ?></td>
			<td><?php echo $Course['Subject']; ?></td>
			<td><?php echo $Course['Name']; ?></td>
			<td><?php echo $Course['Instructor_No']; ?></td>
			<td><?php echo $Course['Cost'].'€'; ?></td>
			<td><?php echo $Course['Date_From']; ?></td>
			<td><?php echo $Course['Date_To']; ?></td>
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
	print '<br />';
	echo "User No:  -".$this->session->userdata('userNo').'-';
	?>
	<br />
	<br />
	<form>
		<input type="button" value="Neuen Kurs erstellen" onclick="window.location.href='<?php echo base_url(); ?>/index.php/course/create/'">
	</form>
	<?php
}
else {
	echo "Eingeloggt: Nein";
}
echo "<br />";
echo "<br />";
if ($this->session->userdata('admin') == TRUE)
{
	echo "Admin: Ja";
	?>
	<br />
	<br />
	<form>
		<input type="button" value="Admin Bereich" onclick="window.location.href='<?php echo base_url(); ?>/index.php/admin'">
	</form>
	<?php
}
else {
	echo "Admin: Nein";
}
?>
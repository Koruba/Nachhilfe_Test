<h1>Liste aller zugelessaner Kurse</h1>
<table>
	<tr>
		<td>Fach</td>
		<td>Kurs-Name</td>
		<td>Detail-Link</td>
	</tr>
<?php 
	foreach($course_list as $Course):		
		?>
		<tr>
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
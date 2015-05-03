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
	foreach($Booked_Courses as $User_Course_Entry):		
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
<br />
<br />
<h1>Meine angebotenen Kurse:</h1>
<table>
	<tr>
		<td>Kurs-Nr</td>
		<td>Fach</td>
		<td>Kurs-Name</td>
		<td>Gebuchte Plätze</td>
		<td>Freie Plätze</td>
		<td>Teilnehmerliste</td>
		<td>Akzeptiert</td>
		<td>Detail-Link</td>
	</tr>
<?php 
	foreach($User_Courses as $User_Course):		
		?>
		<tr>
			<td><?php echo $User_Course['No']; ?></td>
			<td><?php echo $User_Course['Subject']; ?></td>
			<td><?php echo $User_Course['Name']; ?></td>
			<td>
				<?php 
					if ($Entry_Count[$User_Course['No']] == 0)
					{
						?>
							<p style="color: red;">0</p>
						<?php
					}else {
						print '<p style="color: green;">'.$Entry_Count[$User_Course['No']].'</p>';
					}
				?>				
			</td>
			<td>
				<?php
					$freiePlaetze = $User_Course['Maximum_Participants'] - $Entry_Count[$User_Course['No']];
					if ($freiePlaetze == 0)
					{
						print '<p style="color: red;">'.$freiePlaetze.'</p>';
					}else {
						echo $freiePlaetze;
					}
				?>
			</td>
			<td>
				<?php
				if($User_Course['Accepted'] == 1)
				{
				?>
					<a href="<?php echo base_url().'index.php/course/participants/'.(string)$User_Course['No']; ?>">Teilnehmerliste</a>
				<?php
				} else {
					echo "-----";
				}
				?>		
			</td>
			<?php
				if($User_Course['Accepted'] == 1)
				{
					?>
					<td>
						<p style="color: green;">Ja</p>
					</td>
					<td><a href="<?php echo base_url().'index.php/course/detail/'.(string)$User_Course['No']; ?>">Details</a></td>
					<?php
				}
				else {
					?>
					<td>
						<p style="color: red;">Nein</p>
					</td>
					<td><a href="<?php echo base_url().'index.php/course/preview/'.(string)$User_Course['No']; ?>">Vorschau</a></td>
					<?php
				}
			?>			
		</tr>
		<?php
	endforeach;
	print '<br />';
 ?>
 </table>
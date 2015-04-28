<h1>Teilnehmerliste</h1>
<br />
<h2><?php echo $Course_Info['queryCourseName']; ?></h2>
<p><?php echo $Course_Info['queryUserFirstName'].' '.$Course_Info['queryUserLastName'].' - '.$Course_Info['queryUserClass']; ?></p>
<br />
<table>
	<tr>
		<td><b>Vorname</b></td>
		<td><b>Nachname</b></td>
		<td><b>Klasse</b></td>
		<td><b>E-Mail Adresse</b></td>
	</tr>
<?php
foreach ($Course_Entry as $CourseEntry):
?>
	<tr>
		<td><?php echo $Participant_Info[$CourseEntry['User_No']]['First_Name']; ?></td>
		<td><?php echo $Participant_Info[$CourseEntry['User_No']]['Last_Name']; ?></td>
		<td><?php echo $Participant_Info[$CourseEntry['User_No']]['Class']; ?></td>
		<td><?php echo $Participant_Info[$CourseEntry['User_No']]['E_Mail_Address']; ?></td>
	</tr>
<?php	
endforeach;
?>
</table>
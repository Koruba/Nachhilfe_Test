
<h1>Einen Neuen Kurs erstellen</h1>

<p>Bitte geben Sie die Informationen unten ein.</p>

<?php
	
echo form_open('Course_controller/createNewCourse');

$subject = array(
	'name'		=>		'subject',
	'id' 		=> 		'subject',
	'value'		=> 		set_value('subject')
);

$name = array(
	'name'		=>		'name',
	'id' 		=> 		'name',
	'value'		=> 		set_value('name'),
	'size'      =>      '50'
);

$date_from = array(
	'name'		=>		'date_from',
	'id' 		=> 		'date_from',
	'value'		=> 		set_value('date_from')
);

$date_to = array(
	'name'		=>		'date_to',
	'id' 		=> 		'date_to',
	'value'		=> 		set_value('date_to')
);

$cost = array(
	'name'		=>		'cost',
	'id' 		=> 		'cost',
	'value'		=> 		set_value('cost')
);

$maximum_participants = array(
	'name'		=>		'maximum_participants',
	'id' 		=> 		'maximum_participants',
	'value'		=> 		set_value('maximum_participants')
);

?>

<ul>
	<li>
		<label>Fach:</label>
		<div>
			<?php
				$locSubject_List = array();
				$i = 1;
				foreach($subject_list as $subject_list_item):
					array_push($locSubject_List, $subject_list_item);
				endforeach;
				echo form_dropdown('subject', $subject_list);
			?>
		</div>	
	</li>	
	<li>
		<label>Name:</label>
		<div>
			<?php echo form_input($name); ?>
		</div>	
	</li>
	<li>
		<label>Kursbeschreibung:</label>
		<div>
			<textarea cols="100" rows="15" name="description"></textarea>
		</div>
	</li>	
	<li>
		<label>Von Datum:</label>
		<div>
			<?php echo form_input($date_from); ?>
		</div>	
	</li>	
	<li>
		<label>Bis Datum:</label>
		<div>
			<?php echo form_input($date_to); ?>
		</div>	
	</li>	
	<li>
		<label>Kosten:</label>
		<div>
			<?php echo form_input($cost); ?>
		</div>	
	</li>	
	<li>
		<label>Maximale Teilnehmerzahl:</label>
		<div>
			<?php echo form_input($maximum_participants); ?>
		</div>	
	</li>	
	<li>
		<?php echo validation_errors(); ?>
	</li>	
	<li>
		<div>
			<?php echo form_submit(array('name' => 'newCourse'), 'Kurs anlegen'); ?>
		</div>	
	</li>
</ul>
</form>

<?php echo form_close(); ?>
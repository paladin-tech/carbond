<fieldset>
	<legend>Vehicle Advertisement Data</legend>
	<?php
	echo $form->textAreaControlGroup($modelVehicleAdvertisement, 'description', array('span' => 8, 'rows' => 5));
	echo $form->textFieldControlGroup($modelVehicleAdvertisement, 'price');
	?>
</fieldset>
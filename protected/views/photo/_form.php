<fieldset>
	<legend>Vehicle Photos</legend>
    <div class="group_info">
	<?php
	foreach ($modelPhotoArray as $i => $photo) {
		echo $form->fileFieldControlGroup($photo, "[$i]file_name");
	}
	?>
    </div>
</fieldset>
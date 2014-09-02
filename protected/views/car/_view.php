<?php
/* @var $this CarController */
/* @var $data Car */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('carid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->carid), array('view', 'id'=>$data->carid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carossery_type')); ?>:</b>
	<?php echo CHtml::encode($data->carossery_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_doors')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_doors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_seats')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_seats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stearing_wheel_side')); ?>:</b>
	<?php echo CHtml::encode($data->stearing_wheel_side); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enterier')); ?>:</b>
	<?php echo CHtml::encode($data->enterier); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('enterier_color')); ?>:</b>
	<?php echo CHtml::encode($data->enterier_color); ?>
	<br />

	*/ ?>

</div>
<?php
/* @var $this BoatController */
/* @var $data Boat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('boatid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->boatid), array('view', 'id'=>$data->boatid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('body_material')); ?>:</b>
	<?php echo CHtml::encode($data->body_material); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number_of_engines')); ?>:</b>
	<?php echo CHtml::encode($data->number_of_engines); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('length')); ?>:</b>
	<?php echo CHtml::encode($data->length); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('width')); ?>:</b>
	<?php echo CHtml::encode($data->width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />


</div>
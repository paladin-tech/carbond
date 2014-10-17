<?php
/* @var $this TrailerController */
/* @var $data Trailer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('trailerid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->trailerid), array('view', 'id'=>$data->trailerid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_axis')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_axis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_load')); ?>:</b>
	<?php echo CHtml::encode($data->max_load); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_weight')); ?>:</b>
	<?php echo CHtml::encode($data->max_weight); ?>
	<br />


</div>
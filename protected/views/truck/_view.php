<?php
/* @var $this TruckController */
/* @var $data Truck */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('truckid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->truckid), array('view', 'id'=>$data->truckid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_doors')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_doors); ?>
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
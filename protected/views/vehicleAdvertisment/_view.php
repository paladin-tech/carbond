<?php
/* @var $this VehicleAdvertismentController */
/* @var $data VehicleAdvertisment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_advertismentid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vehicle_advertismentid), array('view', 'id'=>$data->vehicle_advertismentid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_date')); ?>:</b>
	<?php echo CHtml::encode($data->created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_change')); ?>:</b>
	<?php echo CHtml::encode($data->last_change); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valid_to')); ?>:</b>
	<?php echo CHtml::encode($data->valid_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />


</div>
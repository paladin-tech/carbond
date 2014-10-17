<?php
/* @var $this VehicleTypeController */
/* @var $data VehicleType */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_typeid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vehicle_typeid), array('view', 'id' => $data->vehicle_typeid)); ?>
	<br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_type')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_type); ?>
	<br/>

</div>
<?php
/* @var $this VehiclePropertyController */
/* @var $data VehicleProperty */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_propertyid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vehicle_propertyid), array('view', 'id'=>$data->vehicle_propertyid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_property_name')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_property_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_typeid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_typeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('property_typeid')); ?>:</b>
	<?php echo CHtml::encode($data->property_typeid); ?>
	<br />


</div>
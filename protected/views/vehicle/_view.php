<?php
/* @var $this VehicleController */
/* @var $data Vehicle */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vehicleid), array('view', 'id'=>$data->vehicleid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vin')); ?>:</b>
	<?php echo CHtml::encode($data->vin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_number')); ?>:</b>
	<?php echo CHtml::encode($data->engine_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_typeid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_typeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelid')); ?>:</b>
	<?php echo CHtml::encode($data->modelid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_year')); ?>:</b>
	<?php echo CHtml::encode($data->production_year); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_registration')); ?>:</b>
	<?php echo CHtml::encode($data->first_registration); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('variant')); ?>:</b>
	<?php echo CHtml::encode($data->variant); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('km')); ?>:</b>
	<?php echo CHtml::encode($data->km); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_ccm')); ?>:</b>
	<?php echo CHtml::encode($data->engine_ccm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_power')); ?>:</b>
	<?php echo CHtml::encode($data->engine_power); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fuel_typeid')); ?>:</b>
	<?php echo CHtml::encode($data->fuel_typeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('engine_emission_class')); ?>:</b>
	<?php echo CHtml::encode($data->engine_emission_class); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gear_type')); ?>:</b>
	<?php echo CHtml::encode($data->gear_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transmission_type')); ?>:</b>
	<?php echo CHtml::encode($data->transmission_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color')); ?>:</b>
	<?php echo CHtml::encode($data->color); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registered')); ?>:</b>
	<?php echo CHtml::encode($data->registered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_valid_to')); ?>:</b>
	<?php echo CHtml::encode($data->registration_valid_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicle_origin')); ?>:</b>
	<?php echo CHtml::encode($data->vehicle_origin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('damages')); ?>:</b>
	<?php echo CHtml::encode($data->damages); ?>
	<br />

	*/ ?>

</div>
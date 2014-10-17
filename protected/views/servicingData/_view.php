<?php
/* @var $this ServicingDataController */
/* @var $data ServicingData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicing_dataid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->servicing_dataid), array('view', 'id'=>$data->servicing_dataid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serviceid')); ?>:</b>
	<?php echo CHtml::encode($data->serviceid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('service_name')); ?>:</b>
	<?php echo CHtml::encode($data->service_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_provider')); ?>:</b>
	<?php echo CHtml::encode($data->data_provider); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servicing_date')); ?>:</b>
	<?php echo CHtml::encode($data->servicing_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('service_type')); ?>:</b>
	<?php echo CHtml::encode($data->service_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mileage')); ?>:</b>
	<?php echo CHtml::encode($data->mileage); ?>
	<br />

	*/ ?>

</div>
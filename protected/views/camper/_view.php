<?php
/* @var $this CamperController */
/* @var $data Camper */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('camperid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->camperid), array('view', 'id'=>$data->camperid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('max_weight')); ?>:</b>
	<?php echo CHtml::encode($data->max_weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_doors')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_doors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_axis')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_axis); ?>
	<br />


</div>
<?php
/* @var $this BusController */
/* @var $data Bus */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('busid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->busid), array('view', 'id'=>$data->busid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_seats')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_seats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_of_doors')); ?>:</b>
	<?php echo CHtml::encode($data->no_of_doors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vehicleid')); ?>:</b>
	<?php echo CHtml::encode($data->vehicleid); ?>
	<br />


</div>
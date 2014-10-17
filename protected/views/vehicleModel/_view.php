<?php
/* @var $this VehicleModelController */
/* @var $data VehicleModel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->modelid), array('view', 'id'=>$data->modelid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('model_name')); ?>:</b>
	<?php echo CHtml::encode($data->model_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('makeid')); ?>:</b>
	<?php echo CHtml::encode($data->makeid); ?>
	<br />


</div>
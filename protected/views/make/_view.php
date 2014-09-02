<?php
/* @var $this MakeController */
/* @var $data Make */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('makeid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->makeid), array('view', 'id'=>$data->makeid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('make_name')); ?>:</b>
	<?php echo CHtml::encode($data->make_name); ?>
	<br />


</div>
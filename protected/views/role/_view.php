<?php
/* @var $this RoleController */
/* @var $data Role */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->roleid), array('view', 'id'=>$data->roleid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role_name')); ?>:</b>
	<?php echo CHtml::encode($data->role_name); ?>
	<br />


</div>
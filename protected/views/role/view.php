<?php
/* @var $this RoleController */
/* @var $model Role */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Roles'=>array('index'),
		$model->role_name,
	),
));
?>

<?php echo TbHtml::pageHeader($model->role_name, 'detail view'); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'roleid',
		'role_name',
	),
)); ?>
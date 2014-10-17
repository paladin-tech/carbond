<?php
/* @var $this RoleController */
/* @var $model Role */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Roles'           => array('index'),
		$model->role_name => array('view', 'id' => $model->roleid),
		'Update',
	),
));
?>

<?php echo TbHtml::pageHeader($model->role_name, 'update view'); ?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
<?php
/* @var $this UserController */
/* @var $model User */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Users' => array('index'),
		'Create',
	),
));
?>

<?php echo TbHtml::pageHeader('New User', 'create view'); ?>

<?php $this->renderPartial('_form', array('model' => $model, 'modelUserType' => $modelUserType)); ?>
<?php
/* @var $this RoleController */
/* @var $model Role */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Roles' => array('index'),
		'Create',
	),
));
?>

<?php echo TbHtml::pageHeader('New Role', 'create view'); ?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
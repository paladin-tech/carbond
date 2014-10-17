<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Models' => array('index'),
		'Create',
	),
));
?>

<?php echo TbHtml::pageHeader('New Vehicle Model', 'create view'); ?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
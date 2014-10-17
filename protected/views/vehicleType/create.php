<?php
/* @var $this VehicleTypeController */
/* @var $model VehicleType */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Types' => array('index'),
		'Create',
	),
));
?>

<?php echo TbHtml::pageHeader('New Vehicle Type', 'create view'); ?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
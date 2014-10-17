<?php
/* @var $this VehicleTypeController */
/* @var $model VehicleType */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Types'      => array('index'),
		$model->vehicle_type => array('view', 'id' => $model->vehicle_typeid),
		'Update',
	),
));
?>

<?php echo TbHtml::pageHeader($model->vehicle_type, 'update view'); ?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>
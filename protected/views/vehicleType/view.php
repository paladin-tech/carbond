<?php
/* @var $this VehicleTypeController */
/* @var $model VehicleType */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Types'=>array('index'),
		$model->vehicle_type,
	),
));
?>

<?php echo TbHtml::pageHeader($model->vehicle_type, 'detail view'); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicle_typeid',
		'vehicle_type',
	),
)); ?>
<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Models'=>array('index'),
		$model->model_name,
	),
));
?>

<?php echo TbHtml::pageHeader($model->model_name, 'detail view'); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'modelid',
		'model_name',
		'makeid',
	),
)); ?>
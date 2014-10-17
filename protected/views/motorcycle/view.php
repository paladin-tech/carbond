<?php
/* @var $this TruckController */
/* @var $model Truck */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Motorcycles' => array('index'),
		$model->model->make->make_name,
	),
));
?>

<?php echo TbHtml::pageHeader($model->model->make->make_name, 'detail view'); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicleid',
	),
)); ?>
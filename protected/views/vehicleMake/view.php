<?php
/* @var $this VehicleMakeController */
/* @var $model VehicleMake */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Make' => array('index'),
		$model->make_name,
	),
));
?>

<?php echo TbHtml::pageHeader($model->make_name, 'detail view'); ?>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'makeid',
		'make_name',
	),
)); ?>
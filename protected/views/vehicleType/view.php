<?php
/* @var $this VehicleTypeController */
/* @var $model VehicleType */

$this->breadcrumbs=array(
	'Vehicle Types'=>array('index'),
	$model->vehicle_typeid,
);

$this->menu=array(
	array('label'=>'List VehicleType', 'url'=>array('index')),
	array('label'=>'Create VehicleType', 'url'=>array('create')),
	array('label'=>'Update VehicleType', 'url'=>array('update', 'id'=>$model->vehicle_typeid)),
	array('label'=>'Delete VehicleType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vehicle_typeid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleType', 'url'=>array('admin')),
);
?>

<h1>View VehicleType #<?php echo $model->vehicle_typeid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicle_typeid',
		'vehicle_type',
	),
)); ?>

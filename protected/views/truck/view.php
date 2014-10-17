<?php
/* @var $this TruckController */
/* @var $model Truck */

$this->breadcrumbs=array(
	'Trucks'=>array('index'),
	$model->truckid,
);

$this->menu=array(
	array('label'=>'List Truck', 'url'=>array('index')),
	array('label'=>'Create Truck', 'url'=>array('create')),
	array('label'=>'Update Truck', 'url'=>array('update', 'id'=>$model->truckid)),
	array('label'=>'Delete Truck', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->truckid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Truck', 'url'=>array('admin')),
);
?>

<h1>View Truck #<?php echo $model->truckid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'truckid',
		'vehicleid',
		'no_of_doors',
		'height',
		'no_of_axis',
		'max_load',
		'max_weight',
	),
)); ?>

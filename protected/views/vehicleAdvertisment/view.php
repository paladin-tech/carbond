<?php
/* @var $this VehicleAdvertismentController */
/* @var $model VehicleAdvertisment */

$this->breadcrumbs=array(
	'Vehicle Advertisments'=>array('index'),
	$model->vehicle_advertismentid,
);

$this->menu=array(
	array('label'=>'List VehicleAdvertisment', 'url'=>array('index')),
	array('label'=>'Create VehicleAdvertisment', 'url'=>array('create')),
	array('label'=>'Update VehicleAdvertisment', 'url'=>array('update', 'id'=>$model->vehicle_advertismentid)),
	array('label'=>'Delete VehicleAdvertisment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vehicle_advertismentid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleAdvertisment', 'url'=>array('admin')),
);
?>

<h1>View VehicleAdvertisment #<?php echo $model->vehicle_advertismentid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicle_advertismentid',
		'vehicleid',
		'created_date',
		'last_change',
		'valid_to',
		'active',
	),
)); ?>

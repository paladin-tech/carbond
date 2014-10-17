<?php
/* @var $this VehicleController */
/* @var $model Vehicle */

$this->breadcrumbs=array(
	'Vehicles'=>array('index'),
	$model->vehicleid,
);

$this->menu=array(
	array('label'=>'List Vehicle', 'url'=>array('index')),
	array('label'=>'Create Vehicle', 'url'=>array('create')),
	array('label'=>'Update Vehicle', 'url'=>array('update', 'id'=>$model->vehicleid)),
	array('label'=>'Delete Vehicle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vehicleid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Vehicle', 'url'=>array('admin')),
);
?>

<h1>View Vehicle #<?php echo $model->vehicleid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicleid',
		'vin',
		'engine_number',
		'vehicle_typeid',
		'modelid',
		'production_year',
		'first_registration',
		'variant',
		'km',
		'engine_ccm',
		'engine_power',
		'fuel_typeid',
		'engine_emission_class',
		'gear_type',
		'transmission_type',
		'color',
		'registered',
		'registration_valid_to',
		'vehicle_origin',
		'damages',
	),
)); ?>

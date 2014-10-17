<?php
/* @var $this VehiclePropertyController */
/* @var $model VehicleProperty */

$this->breadcrumbs=array(
	'Vehicle Properties'=>array('index'),
	$model->vehicle_propertyid,
);

$this->menu=array(
	array('label'=>'List VehicleProperty', 'url'=>array('index')),
	array('label'=>'Create VehicleProperty', 'url'=>array('create')),
	array('label'=>'Update VehicleProperty', 'url'=>array('update', 'id'=>$model->vehicle_propertyid)),
	array('label'=>'Delete VehicleProperty', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->vehicle_propertyid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VehicleProperty', 'url'=>array('admin')),
);
?>

<h1>View VehicleProperty #<?php echo $model->vehicle_propertyid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'vehicle_propertyid',
		'vehicle_property_name',
		'vehicle_typeid',
		'property_typeid',
	),
)); ?>

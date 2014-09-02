<?php
/* @var $this VehiclePropertyController */
/* @var $model VehicleProperty */

$this->breadcrumbs=array(
	'Vehicle Properties'=>array('index'),
	$model->vehicle_propertyid=>array('view','id'=>$model->vehicle_propertyid),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleProperty', 'url'=>array('index')),
	array('label'=>'Create VehicleProperty', 'url'=>array('create')),
	array('label'=>'View VehicleProperty', 'url'=>array('view', 'id'=>$model->vehicle_propertyid)),
	array('label'=>'Manage VehicleProperty', 'url'=>array('admin')),
);
?>

<h1>Update VehicleProperty <?php echo $model->vehicle_propertyid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
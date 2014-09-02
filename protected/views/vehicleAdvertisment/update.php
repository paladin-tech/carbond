<?php
/* @var $this VehicleAdvertismentController */
/* @var $model VehicleAdvertisment */

$this->breadcrumbs=array(
	'Vehicle Advertisments'=>array('index'),
	$model->vehicle_advertismentid=>array('view','id'=>$model->vehicle_advertismentid),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleAdvertisment', 'url'=>array('index')),
	array('label'=>'Create VehicleAdvertisment', 'url'=>array('create')),
	array('label'=>'View VehicleAdvertisment', 'url'=>array('view', 'id'=>$model->vehicle_advertismentid)),
	array('label'=>'Manage VehicleAdvertisment', 'url'=>array('admin')),
);
?>

<h1>Update VehicleAdvertisment <?php echo $model->vehicle_advertismentid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
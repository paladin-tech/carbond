<?php
/* @var $this VehicleAdvertismentController */
/* @var $model VehicleAdvertisment */

$this->breadcrumbs=array(
	'Vehicle Advertisments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleAdvertisment', 'url'=>array('index')),
	array('label'=>'Manage VehicleAdvertisment', 'url'=>array('admin')),
);
?>

<h1>Create VehicleAdvertisment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this VehiclePropertyController */
/* @var $model VehicleProperty */

$this->breadcrumbs=array(
	'Vehicle Properties'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VehicleProperty', 'url'=>array('index')),
	array('label'=>'Manage VehicleProperty', 'url'=>array('admin')),
);
?>

<h1>Create VehicleProperty</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
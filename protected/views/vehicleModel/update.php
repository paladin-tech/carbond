<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */

$this->breadcrumbs=array(
	'Vehicle Models'=>array('index'),
	$model->modelid=>array('view','id'=>$model->modelid),
	'Update',
);

$this->menu=array(
	array('label'=>'List VehicleModel', 'url'=>array('index')),
	array('label'=>'Create VehicleModel', 'url'=>array('create')),
	array('label'=>'View VehicleModel', 'url'=>array('view', 'id'=>$model->modelid)),
	array('label'=>'Manage VehicleModel', 'url'=>array('admin')),
);
?>

<h1>Update VehicleModel <?php echo $model->modelid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<?php
/* @var $this CamperController */
/* @var $model Camper */

$this->breadcrumbs=array(
	'Campers'=>array('index'),
	$model->camperid=>array('view','id'=>$model->camperid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Camper', 'url'=>array('index')),
	array('label'=>'Create Camper', 'url'=>array('create')),
	array('label'=>'View Camper', 'url'=>array('view', 'id'=>$model->camperid)),
	array('label'=>'Manage Camper', 'url'=>array('admin')),
);
?>

<h1>Update Camper <?php echo $model->camperid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
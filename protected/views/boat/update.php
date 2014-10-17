<?php
/* @var $this BoatController */
/* @var $model Boat */

$this->breadcrumbs=array(
	'Boats'=>array('index'),
	$model->boatid=>array('view','id'=>$model->boatid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Boat', 'url'=>array('index')),
	array('label'=>'Create Boat', 'url'=>array('create')),
	array('label'=>'View Boat', 'url'=>array('view', 'id'=>$model->boatid)),
	array('label'=>'Manage Boat', 'url'=>array('admin')),
);
?>

<h1>Update Boat <?php echo $model->boatid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
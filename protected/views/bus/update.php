<?php
/* @var $this BusController */
/* @var $model Bus */

$this->breadcrumbs=array(
	'Buses'=>array('index'),
	$model->busid=>array('view','id'=>$model->busid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bus', 'url'=>array('index')),
	array('label'=>'Create Bus', 'url'=>array('create')),
	array('label'=>'View Bus', 'url'=>array('view', 'id'=>$model->busid)),
	array('label'=>'Manage Bus', 'url'=>array('admin')),
);
?>

<h1>Update Bus <?php echo $model->busid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
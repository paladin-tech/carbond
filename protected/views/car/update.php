<?php
/* @var $this CarController */
/* @var $model Car */

$this->breadcrumbs=array(
	'Cars'=>array('index'),
	$model->carid=>array('view','id'=>$model->carid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Car', 'url'=>array('index')),
	array('label'=>'Create Car', 'url'=>array('create')),
	array('label'=>'View Car', 'url'=>array('view', 'id'=>$model->carid)),
	array('label'=>'Manage Car', 'url'=>array('admin')),
);
?>

<h1>Update Car <?php echo $model->carid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
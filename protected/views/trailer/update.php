<?php
/* @var $this TrailerController */
/* @var $model Trailer */

$this->breadcrumbs=array(
	'Trailers'=>array('index'),
	$model->trailerid=>array('view','id'=>$model->trailerid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Trailer', 'url'=>array('index')),
	array('label'=>'Create Trailer', 'url'=>array('create')),
	array('label'=>'View Trailer', 'url'=>array('view', 'id'=>$model->trailerid)),
	array('label'=>'Manage Trailer', 'url'=>array('admin')),
);
?>

<h1>Update Trailer <?php echo $model->trailerid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
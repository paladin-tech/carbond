<?php
/* @var $this MakeController */
/* @var $model Make */

$this->breadcrumbs=array(
	'Makes'=>array('index'),
	$model->makeid=>array('view','id'=>$model->makeid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Make', 'url'=>array('index')),
	array('label'=>'Create Make', 'url'=>array('create')),
	array('label'=>'View Make', 'url'=>array('view', 'id'=>$model->makeid)),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>Update Make <?php echo $model->makeid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
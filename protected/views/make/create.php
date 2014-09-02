<?php
/* @var $this MakeController */
/* @var $model Make */

$this->breadcrumbs=array(
	'Makes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Make', 'url'=>array('index')),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>Create Make</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
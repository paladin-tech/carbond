<?php
/* @var $this ServicingDataController */
/* @var $model ServicingData */

$this->breadcrumbs=array(
	'Servicing Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServicingData', 'url'=>array('index')),
	array('label'=>'Manage ServicingData', 'url'=>array('admin')),
);
?>

<h1>Create ServicingData</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
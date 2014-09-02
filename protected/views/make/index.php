<?php
/* @var $this MakeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Makes',
);

$this->menu=array(
	array('label'=>'Create Make', 'url'=>array('create')),
	array('label'=>'Manage Make', 'url'=>array('admin')),
);
?>

<h1>Makes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

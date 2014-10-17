<?php
/* @var $this PhysicalPersonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Physical People',
);

$this->menu=array(
	array('label'=>'Create PhysicalPerson', 'url'=>array('create')),
	array('label'=>'Manage PhysicalPerson', 'url'=>array('admin')),
);
?>

<h1>Physical People</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

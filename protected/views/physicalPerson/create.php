<?php
/* @var $this PhysicalPersonController */
/* @var $model PhysicalPerson */

$this->breadcrumbs=array(
	'Physical People'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PhysicalPerson', 'url'=>array('index')),
	array('label'=>'Manage PhysicalPerson', 'url'=>array('admin')),
);
?>

<h1>Create PhysicalPerson</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
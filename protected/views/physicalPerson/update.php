<?php
/* @var $this PhysicalPersonController */
/* @var $model PhysicalPerson */

$this->breadcrumbs=array(
	'Physical People'=>array('index'),
	$model->partyid=>array('view','id'=>$model->partyid),
	'Update',
);

$this->menu=array(
	array('label'=>'List PhysicalPerson', 'url'=>array('index')),
	array('label'=>'Create PhysicalPerson', 'url'=>array('create')),
	array('label'=>'View PhysicalPerson', 'url'=>array('view', 'id'=>$model->partyid)),
	array('label'=>'Manage PhysicalPerson', 'url'=>array('admin')),
);
?>

<h1>Update PhysicalPerson <?php echo $model->partyid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
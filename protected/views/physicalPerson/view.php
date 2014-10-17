<?php
/* @var $this PhysicalPersonController */
/* @var $model PhysicalPerson */

$this->breadcrumbs=array(
	'Physical People'=>array('index'),
	$model->partyid,
);

$this->menu=array(
	array('label'=>'List PhysicalPerson', 'url'=>array('index')),
	array('label'=>'Create PhysicalPerson', 'url'=>array('create')),
	array('label'=>'Update PhysicalPerson', 'url'=>array('update', 'id'=>$model->partyid)),
	array('label'=>'Delete PhysicalPerson', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->partyid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PhysicalPerson', 'url'=>array('admin')),
);
?>

<h1>View PhysicalPerson #<?php echo $model->partyid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'partyid',
		'first_name',
		'last_name',
		'mobile',
		'email',
		'city',
	),
)); ?>

<?php
/* @var $this CompanyController */
/* @var $model Company */

$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->partyid=>array('view','id'=>$model->partyid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Company', 'url'=>array('index')),
	array('label'=>'Create Company', 'url'=>array('create')),
	array('label'=>'View Company', 'url'=>array('view', 'id'=>$model->partyid)),
	array('label'=>'Manage Company', 'url'=>array('admin')),
);
?>

<h1>Update Company <?php echo $model->partyid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
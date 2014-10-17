<?php
/* @var $this ServicingDataController */
/* @var $model ServicingData */

$this->breadcrumbs=array(
	'Servicing Datas'=>array('index'),
	$model->servicing_dataid=>array('view','id'=>$model->servicing_dataid),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServicingData', 'url'=>array('index')),
	array('label'=>'Create ServicingData', 'url'=>array('create')),
	array('label'=>'View ServicingData', 'url'=>array('view', 'id'=>$model->servicing_dataid)),
	array('label'=>'Manage ServicingData', 'url'=>array('admin')),
);
?>

<h1>Update ServicingData <?php echo $model->servicing_dataid; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
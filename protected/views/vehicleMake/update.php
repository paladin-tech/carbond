<?php
/* @var $this VehicleMakeController */
/* @var $model VehicleMake */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Makes'      => array('index'),
		$model->make_name => array('view', 'id' => $model->makeid),
		'Update',
	),
));
?>

<?php echo TbHtml::pageHeader($model->make_name, 'update view'); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
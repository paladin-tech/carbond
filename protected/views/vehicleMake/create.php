<?php
/* @var $this VehicleMakeController */
/* @var $model VehicleMake */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Vehicle Makes' => array('index'),
		'Create',
	),
));
?>

<?php echo TbHtml::pageHeader('New Vehicle Make', 'create view'); ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
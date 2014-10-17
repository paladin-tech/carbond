<?php
/* @var $this VehiclePropertyController */
/* @var $model VehicleProperty */

$this->breadcrumbs=array(
	'Vehicle Properties'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List VehicleProperty', 'url'=>array('index')),
	array('label'=>'Create VehicleProperty', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#vehicle-property-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Vehicle Properties</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'vehicle-property-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vehicle_propertyid',
		'vehicle_property_name',
		'vehicle_typeid',
		'property_typeid',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

<?php
/* @var $this PhysicalPersonController */
/* @var $model PhysicalPerson */

$this->breadcrumbs=array(
	'Physical People'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PhysicalPerson', 'url'=>array('index')),
	array('label'=>'Create PhysicalPerson', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#physical-person-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Physical People</h1>

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
	'id'=>'physical-person-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'partyid',
		'first_name',
		'last_name',
		'mobile',
		'email',
		'city',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

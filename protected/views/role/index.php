<?php
/* @var $this RoleController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Roles',
	),
));
?>

<?php echo TbHtml::pageHeader('Roles', 'list'); ?>

<?php echo TbHtml::linkButton('New Vehicle Make', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL, 'url' =>  Yii::app()->createUrl('role/create'))); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'type'         => TbHtml::GRID_TYPE_HOVER,
	'template'     => "{items}",
	'columns'      => array(
		array(
			'name'        => 'roleid',
			'header'      => '#',
			'htmlOptions' => array('color' => 'width: 60px'),
		),
		array(
			'name'   => 'role_name',
			'header' => 'Role Name',
			'type'   => 'raw',
			'value'  => 'CHtml::link($data->role_name, Yii::app()->createUrl("role/update", array("id" => $data->roleid)))',
		),
	),
)); ?>
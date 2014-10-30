<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

echo TbHtml::pageHeader('User', 'list view');

$this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'type'         => TbHtml::GRID_TYPE_HOVER,
	'template'     => '{summary}{items}{pager}',
	'columns'      => array(
		'name',
		'role_name',
		array(
			'name'  => 'active',
			'type'  => 'raw',
			'value' => '($data->active == 1) ? "Yes" : "No"',
		),
		'last_login_time',
		array(
			'header' => '#',
			'type'   => 'raw',
			'value'  => 'CHtml::link("details", Yii::app()->createUrl("user/view", array("id" => $data->userid)))',
		),
	),
)); ?>

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
		array(
			'name'   => 'role_name',
			'filter' => CHtml::dropDownList('SearchUsers[role_name]', $model->role_name, CHtml::listData(Role::model()->findAll(), 'role_name', 'role_name'), array('empty' => '')),
		),
		array(
			'name'   => 'active',
			'type'   => 'raw',
			'value'  => '($data->active == 1) ? "Yes" : "No"',
			'filter' => CHtml::dropDownList('SearchUsers[active]', $model->active, array('0' => 'No', '1' => 'Yes'), array('empty' => '')),
		),
		array(
			'class'    => 'CButtonColumn',
			'template' => '{view}{update}',
			'buttons'  => array
			(
				'view' => array
				(
					'label'    => 'View User',
					'url'      => 'Yii::app()->createUrl("user/view", array("id" => $data->userid))',
				),
				'update' => array
				(
					'label'    => 'Update User',
					'url'      => 'Yii::app()->createUrl("user/adminUpdate", array("id" => $data->userid))',
				),
			),
		),
	),
)); ?>

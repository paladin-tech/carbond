<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
	'links' => array(
		'Users',
	),
));
?>

<h1>Users</h1>

<?php echo TbHtml::linkButton('New Company User', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL, 'url' =>  Yii::app()->createUrl('user/create', array('userType' => 'Company')))); ?>&nbsp;&nbsp;
<?php echo TbHtml::linkButton('New Private User', array('color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_SMALL, 'url' =>  Yii::app()->createUrl('user/create', array('userType' => 'PhysicalPerson')))); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider' => $model->search(),
	'filter'       => $model,
	'type'         => TbHtml::GRID_TYPE_HOVER,
	'template'     => '{summary}{items}{pager}',
	'columns'      => array(
		array(
			'name'        => 'userid',
			'header'      => '#',
			'htmlOptions' => array('color' => 'width: 60px'),
		),
		array(
			'name'   => 'username',
			'header' => 'Username',
			'type'   => 'raw',
			'value'  => 'CHtml::link($data->username, Yii::app()->createUrl("user/update", array("userType" => $data->userType,"id" => $data->userid)))',
		),
	),
)); ?>

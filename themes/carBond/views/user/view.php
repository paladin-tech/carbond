<?php
/* @var $this UserController */
/* @var $model User */

echo TbHtml::pageHeader('User', 'detail view', array('style' => 'float: left'));
echo TbHtml::linkButton('Back', array('url' => $this->createUrl('/user/index'), 'style' => 'float: right'));

$this->widget('zii.widgets.CDetailView', array(
	'data'       => $model,
	'attributes' => array(
		'username',
		array(
			'name' => 'active',
			'value' => ($model->active == 0) ? 'Yes' : 'No',
		),
		array(
			'name' => 'Name',
			'type' => 'raw',
			'value' => ($model->party->partyRoles[0]->roleid == 1) ? $model->party->physicalPerson->first_name . ' ' . $model->party->physicalPerson->last_name : $model->party->company->company_name,
		),
	),
)); ?>

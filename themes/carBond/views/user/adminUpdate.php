<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
echo TbHtml::pageHeader('User', 'update');
?>

<?php $this->renderPartial('_adminForm', array('modelUser' => $modelUser, 'modelUserType' => $modelUserType)); ?>
<?php
/* @var $this RoleController */
/* @var $model Role */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>
<div class="form">

<fieldset>
	<legend>Role Data</legend>
	<?php echo $form->textFieldControlGroup($model, 'role_name', array('size' => 45, 'maxlength' => 45)); ?>
	<?php echo $form->error($model, 'role_name'); ?>
</fieldset>
<?php echo TbHtml::formActions(array(TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)), TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('role/index'))),
)); ?>

<?php $this->endWidget(); ?>
<?php
/* @var $this VehicleMakeController */
/* @var $model VehicleMake */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
	<legend>Vehicle Make Data</legend>
	<?php echo $form->textFieldControlGroup($model, 'make_name', array('size' => 45, 'maxlength' => 45)); ?>
	<?php echo $form->error($model, 'make_name'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)), TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('vehicleMake/index'))),
)); ?>

<?php $this->endWidget(); ?>
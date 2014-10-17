<?php
/* @var $this VehicleModelController */
/* @var $model VehicleModel */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
	<legend>Vehicle Type Data</legend>
	<?php echo $form->textFieldControlGroup($model, 'model_name', array('size' => 45, 'maxlength' => 45)); ?>
	<?php echo $form->error($model, 'model_name'); ?>
	<?php echo $form->dropDownListControlGroup($model, 'makeid', CHtml::listData(VehicleMake::model()->findAll(), 'makeid', 'make_name'), array('empty' => 'Select Make')); ?>
	<?php echo $form->error($model, 'makeid'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)), TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('vehicleModel/index'))),
)); ?>

<?php $this->endWidget(); ?>
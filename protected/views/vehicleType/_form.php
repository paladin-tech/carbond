<?php
/* @var $this VehicleTypeController */
/* @var $model VehicleType */
/* @var $form CActiveForm */
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
)); ?>

<fieldset>
	<legend>Vehicle Type Data</legend>
	<?php echo $form->textFieldControlGroup($model, 'vehicle_type', array('size' => 45, 'maxlength' => 45)); ?>
	<?php echo $form->error($model, 'vehicle_type'); ?>
</fieldset>

<?php echo TbHtml::formActions(array(TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)), TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('vehicleType/index'))),
)); ?>

<?php $this->endWidget(); ?>
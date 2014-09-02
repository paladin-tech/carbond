<?php
/* @var $this VehiclePropertyController */
/* @var $model VehicleProperty */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vehicle_propertyid'); ?>
		<?php echo $form->textField($model,'vehicle_propertyid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_property_name'); ?>
		<?php echo $form->textField($model,'vehicle_property_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_typeid'); ?>
		<?php echo $form->textField($model,'vehicle_typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'property_typeid'); ?>
		<?php echo $form->textField($model,'property_typeid'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
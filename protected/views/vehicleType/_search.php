<?php
/* @var $this VehicleTypeController */
/* @var $model VehicleType */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'vehicle_typeid'); ?>
		<?php echo $form->textField($model,'vehicle_typeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicle_type'); ?>
		<?php echo $form->textField($model,'vehicle_type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
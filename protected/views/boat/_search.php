<?php
/* @var $this BoatController */
/* @var $model Boat */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'boatid'); ?>
		<?php echo $form->textField($model,'boatid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vehicleid'); ?>
		<?php echo $form->textField($model,'vehicleid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'body_material'); ?>
		<?php echo $form->textField($model,'body_material'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number_of_engines'); ?>
		<?php echo $form->textField($model,'number_of_engines'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'length'); ?>
		<?php echo $form->textField($model,'length'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'width'); ?>
		<?php echo $form->textField($model,'width'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
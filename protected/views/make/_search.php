<?php
/* @var $this MakeController */
/* @var $model Make */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'makeid'); ?>
		<?php echo $form->textField($model,'makeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'make_name'); ?>
		<?php echo $form->textField($model,'make_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
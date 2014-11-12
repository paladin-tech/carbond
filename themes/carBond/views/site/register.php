<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'action'                 => Yii::app()->createUrl('site/register'),
	'id'                     => 'register-form',
	'enableClientValidation' => true,
	'enableAjaxValidation'   => true,
	'clientOptions'          => array(
		'validateOnSubmit' => true,
	),
));
?>

<fieldset>
	<legend>Registration Data</legend>
	<?php
	echo $form->textFieldControlGroup($modelPhysicalPerson, 'first_name');
	echo $form->textFieldControlGroup($modelPhysicalPerson, 'last_name');
	echo $form->textFieldControlGroup($modelUser, 'username');
	echo $form->passwordFieldControlGroup($modelUser, 'password');
	?>
</fieldset>

<?php echo TbHtml::formActions(array(
	TbHtml::submitButton('Register', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('site/index'))),
)); ?>

<?php $this->endWidget(); ?>
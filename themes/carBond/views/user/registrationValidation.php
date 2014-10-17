<h1>Validation Successful</h1>
<p>Thank you for validating the registration. Please setup your password to complete the registration and login to your account.</p>

<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'               => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'enableAjaxValidation' => false,
	'clientOptions'        => array(
		'validateOnSubmit' => true,
	),
));
?>

<?php
echo $form->errorSummary($setupPassword);
?>

<fieldset>
	<legend>Vehicle Advertisement Data</legend>
	<?php
	echo $form->passwordFieldControlGroup($setupPassword, 'password');
	echo $form->passwordFieldControlGroup($setupPassword, 'repeatPassword');
	?>
</fieldset>

<?php echo TbHtml::formActions(array(
	TbHtml::submitButton('Set Password', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
)); ?>

<?php $this->endWidget(); ?>
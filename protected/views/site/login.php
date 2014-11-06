<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<?php
echo TbHtml::pageHeader('Login', '');
?>

<p>Please fill out the following form with your login credentials:</p>


<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'layout'                 => TbHtml::FORM_LAYOUT_HORIZONTAL,
	'id'                     => 'login-form',
	'enableClientValidation' => true,
	'clientOptions'          => array(
		'validateOnSubmit' => true,
	),
));
?>

<fieldset>
	<legend>Login Credentials</legend>
	<?php
	echo $form->textFieldControlGroup($model, 'username');
	echo $form->passwordFieldControlGroup($model, 'password');
	echo $form->checkBoxControlGroup($model, 'rememberMe');
	?>
</fieldset>

<?php echo TbHtml::formActions(array(
	TbHtml::submitButton('Login', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
	TbHtml::linkButton('Cancel', array('url' => Yii::app()->createUrl('site/index'))),
)); ?>

<?php $this->endWidget(); ?>
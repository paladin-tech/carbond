<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SetupPasswordForm extends CFormModel
{

	public $password;
	public $repeatPassword;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('password, repeatPassword', 'required'),
			array('password', 'compare', 'compareAttribute' => 'repeatPassword'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password' => 'Password',
			'repeatPassword' => 'Repeat Password',
		);
	}

}

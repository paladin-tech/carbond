<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$user = User::model()->find('LOWER(username)=?', array(strtolower($this->username)));
		$userRoles = array();

		foreach($user->party->partyRoles as $partyRole) {
			$userRoles[] = array($partyRole->role->roleid => $partyRole->role->role_name);
		}

		if ($user === null)
			$this->errorCode = self::ERROR_USERNAME_INVALID;
		else if (!$user->validatePassword($this->password))
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $user->userid;
			$this->username = $user->username;
			$this->setState('lastLogin', date("m/d/y g:i A", strtotime($user->last_login_time)));
			$this->setState('userRoles', Helper::getRoleList($userRoles));
//			$this->setState('roles', $user->accessLevel);
//			Yii::app()->session['role'] = $user->accessLevel;
			$user->saveAttributes(array(
				'last_login_time' => date("Y-m-d H:i:s", time()),
			));
			$this->errorCode = self::ERROR_NONE;
		}
		return $this->errorCode == self::ERROR_NONE;
	}

	public function getId()
	{
		return $this->_id;
	}

}
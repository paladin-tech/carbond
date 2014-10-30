<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow all users to perform 'index' and 'view' actions
				'actions' => array('index', 'view', 'sendValidationMail', 'registrationValidation'),
				'expression' => "Yii::app()->user->getState('userRoles')['isAdmin']",
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create', 'update'),
				'users'   => array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('admin', 'delete'),
				'users'   => array('admin'),
			),
			array('deny', // deny all users
				'users' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($userType)
	{

		$userType = ($userType != 'Company' && $userType != 'PhysicalPerson') ? 'Company' : $userType;
		$modelUser = new User;
		$modelUserType = new $userType;
		$modelUser->userType = $userType;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$modelParty = new Party;
			if ($modelParty->save())
			{
				$modelUser->partyid = $modelParty->partyid;
				$modelUser->attributes = $_POST['User'];
				$modelUserType->partyid = $modelParty->partyid;
				$modelUserType->attributes = $_POST[$userType];
				if ($modelUser->save())
				{
					if($modelUserType->save())
						$this->redirect(array('index'));
				}
			}
		}

		$this->render('create', array(
			'model' => $modelUser, 'modelUserType' => $modelUserType,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$modelUser = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['User'])) {
			$modelUser->attributes = $_POST['User'];
			if ($modelUser->save())
				$this->redirect(array('view', 'id' => $modelUser->userid));
		}

		$this->render('update', array(
			'model' => $modelUser,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$model = new SearchUsers('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['SearchUsers']))
			$model->attributes = $_GET['SearchUsers'];

		$this->render('index', array(
			'model' => $model,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new User('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['User']))
			$model->attributes = $_GET['User'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionSendValidationMail($userId)
	{

		$user = User::model()->findByPk($userId);
//		$mailAddress = $user->username;
		$mailAddress = 'johnsie@gmail.com';

		$link = 'http://carbond.beacon189.com/' . $this->createUrl('user/registrationValidation', array('userId' => $userId, 'key' => 'blah'));
		$to      = $mailAddress;
		$subject = 'Verifikacija oglasa';
		$message = 'Neki tekst za verifikaciju vozila. Ovo je link:<br><br>' . $link;
		$headers = 'From: advertisement@carbond.com' . '\r\n';
		$headers .= 'Content-type: text/html; charset=\'UTF-8\'; format=flowed \r\n';
		$headers .= 'Mime-Version: 1.0 \r\n';
		$headers .= 'Content-Transfer-Encoding: quoted-printable \r\n';
		@mail($to, $subject, $message, $headers);

		$this->render('verificationSent');

	}


	public function actionRegistrationValidation($userId, $key)
	{

		$setupPassword = new SetupPasswordForm;

		if(isset($_POST['SetupPasswordForm']))
		{
			$user = User::model()->findByPk($userId);
			if(!empty($user))
			{
				$setupPassword->attributes = $_POST['SetupPasswordForm'];
				if($setupPassword->validate())
				{
					$user->password = $user->hashPassword($setupPassword->password);
					$user->save();
					$this->redirect(array('/site/login'));
				}
			}
		}

		$this->render('registrationValidation', array('setupPassword' => $setupPassword));

	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = User::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
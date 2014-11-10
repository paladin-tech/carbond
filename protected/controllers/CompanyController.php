<?php

Yii::import('application.extensions.image.Image');

class CompanyController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';

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
				'actions' => array('index', 'view', 'usedCarDealers', 'newCarDistributors'),
				'users'   => array('*'),
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
	public function actionCreate()
	{

		$modelParty     = new Party;
		$modelPartyRole = new PartyRole;
		$modelUser      = new User;
		$modelCompany   = new Company;

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'yw0') {
			echo CActiveForm::validate($modelCompany);
			Yii::app()->end();
		}

		if (isset($_POST['Company'])) {

			// Valid flag for validating multiple models
			$formValid = true;

			$transaction = Yii::app()->db->beginTransaction();

			$modelParty->save();
			$partyId = $modelParty->partyid;

			$modelCompany->attributes = $_POST['Company'];
			$modelCompany->partyid    = $partyId;
			$email                    = $modelCompany->email;

			if ($formValid && $modelCompany->validate())
				$modelCompany->save(false);
			else
				$formValid = false;
			$modelPartyRole->roleid = $_POST['companyType'];

			// Save PartyRole model
			$modelPartyRole->partyid     = $partyId;
			$modelPartyRole->active      = 1;
			$modelPartyRole->active_from = date('Y-m-d');
			$modelPartyRole->active_to   = date('Y-m-d', strtotime('+1 year'));
			if ($formValid && $modelPartyRole->validate())
				$modelPartyRole->save(false);
			else
				$formValid = false;

			// Save User model
			$modelUser->username = $email;
			$modelUser->partyid  = $partyId;
			$modelUser->active   = 1;
			if ($formValid && $modelUser->validate())
				$modelUser->save(false);
			else
				$formValid = false;

			$fileName = $_FILES['Company']['logo']['name'];
			if ($formValid && $fileName != '') {
				$imageExtensionTmp  = explode('.', $fileName);
				$imageExtension     = $imageExtensionTmp[sizeof($imageExtensionTmp) - 1];
				$modelCompany->logo = $imageExtension;
				$imageFile          = 'images/company/normal/company-' . $partyId . '.' . $imageExtension;
				$imageFileThumb     = 'images/company/thumb/vehicleThumb-' . $partyId . '.' . $imageExtension;
				$imageFileTinyThumb = 'images/company/tinyThumb/vehicleTinyThumb-' . $partyId . '.' . $imageExtension;
				$image              = CUploadedFile::getInstanceByName("Company[logo]");
				$image->saveAs($imageFile);
				$imageResized = new Image($imageFile);
				$imageResized->resize('100', '100');
				$imageResized->save($imageFileThumb);
				$imageResized->resize('60', '60');
				$imageResized->save($imageFileTinyThumb);
			}

			if ($formValid) {
				$transaction->commit();
				$this->redirect(array('/user/index'));
			} else {
				$transaction->rollback();
			}

		}

		$this->render('create', array(
			'modelCompany' => $modelCompany,
		));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{

		$modelCompany = Company::model()->findByPk($id);
		$modelUser    = User::model()->findByAttributes(array('partyid' => $id));

		if (isset($_POST['ajax']) && $_POST['ajax'] === 'yw0') {
			echo CActiveForm::validate($modelCompany);
			Yii::app()->end();
		}

		if (isset($_POST['Company'])) {

			// Valid flag for validating multiple models
			$formValid = true;

			$transaction = Yii::app()->db->beginTransaction();

			$modelCompany->attributes = $_POST['Company'];

			$fileName = $_FILES['Company']['name']['logo'];
			var_dump($fileName);
			if ($formValid && $fileName != '') {
				$imageExtensionTmp  = explode('.', $fileName);
				$imageExtension     = $imageExtensionTmp[sizeof($imageExtensionTmp) - 1];
				var_dump($imageExtension);
				$modelCompany->logo = $imageExtension;
				$imageFile          = 'images/company/normal/company-' . $id . '.' . $imageExtension;
				$imageFileThumb     = 'images/company/thumb/companyThumb-' . $id . '.' . $imageExtension;
				$imageFileTinyThumb = 'images/company/tinyThumb/companyTinyThumb-' . $id . '.' . $imageExtension;
				$image              = CUploadedFile::getInstanceByName("Company[logo]");
				$image->saveAs($imageFile);
				$imageResized = new Image($imageFile);
				$imageResized->resize('100', '100');
				$imageResized->save($imageFileThumb);
				$imageResized->resize('60', '60');
				$imageResized->save($imageFileTinyThumb);
			}

			if ($modelCompany->validate())
				$modelCompany->save(false);
			else
				$formValid = false;

			$modelUser->active = $_POST['User']['active'];
			if ($formValid && $modelUser->validate())
				$modelUser->save(false);
			else
				$formValid = false;

			if ($formValid) {
				$transaction->commit();
				$this->redirect(array('/user/index'));
			} else {
				$transaction->rollback();
			}

		}

		$this->render('update', array(
			'modelCompany' => $modelCompany,
			'modelUser'    => $modelUser,
		));

	}

	public function actionUsedCarDealers()
	{

		$modelCompany         = new Company('searchDistributors');
		$modelCompany->roleId = 4;
		$searchFilter         = array();

		if (isset($_POST['yt0'])) {
//			$modelCompany->countryId = $_POST['country'];
//			$modelCompany->cityId    = $_POST['city'];
//			$searchFilter['country'] = $_POST['country'];
//			$searchFilter['city'] = $_POST['city'];
		}

		$this->render('usedCarDealers', array(
			'dataProvider' => $modelCompany->searchDistributors(),
			'searchFilter' => $searchFilter,
		));

	}

	public function actionNewCarDistributors()
	{

		$modelCompany         = new Company('searchDistributors');
		$modelCompany->roleId = 5;
		$searchFilter         = array();

		if (isset($_POST['yt0'])) {
//			$modelCompany->countryId = $_POST['country'];
//			$modelCompany->cityId    = $_POST['city'];
//			$searchFilter['country'] = $_POST['country'];
//			$searchFilter['city'] = $_POST['city'];
		}

		$this->render('usedCarDealers', array(
			'dataProvider' => $modelCompany->searchDistributors(),
			'searchFilter' => $searchFilter,
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
		$dataProvider = new CActiveDataProvider('Company');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Company('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Company']))
			$model->attributes = $_GET['Company'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Company the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Company::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Company $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'company-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

}

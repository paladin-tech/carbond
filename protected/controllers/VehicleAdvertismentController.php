<?php

Yii::import('application.extensions.image.Image');

class VehicleAdvertismentController extends Controller
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
				'actions' => array('index', 'view', 'create', 'test'),
				'users'   => array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
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
		$model         = $this->loadModel($id);
		$servicingData = new CArrayDataProvider($model->vehicle->servicingDatas, array('keyField' => 'servicing_dataid'));
//		echo '<pre>';
//		die(var_dump($arrayDataProvider));
		$this->render('view', array(
			'model'         => $model,
			'servicingData' => $servicingData,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($vehicleTypeId = 1)
	{

		$vehicleTypeName              = VehicleType::model()->findByPk($vehicleTypeId)->vehicle_type;
		$modelClass                   = str_replace(' ', '', ucwords($vehicleTypeName));
		$vehicleType                  = lcfirst(str_replace(' ', '', ucwords($modelClass)));
		$vehicleTypeName              = ucwords($vehicleTypeName);
		$modelClass                   = str_replace(' ', '', ucwords($vehicleTypeName));
		$model                        = (file_exists(Yii::getPathOfAlias('application.models') . DIRECTORY_SEPARATOR . $modelClass . '.php')) ? new $modelClass : '';
		$modelVehicle                 = new Vehicle;
		$modelVehicle->vehicle_typeid = $vehicleTypeId;
		$modelVehicleAdvertisement    = new VehicleAdvertisment;
		$modelParty                   = new Party;
		$modelPartyRole               = new PartyRole;
		$modelUser                    = new User;
		$modelPhysicalPerson          = new PhysicalPerson;
//		$modelPhysicalPerson             = (isset(Yii::app()->user->id)) ? User::model()->findByPk(Yii::app()->user->id)->party->physicalPerson : new PhysicalPerson;
		$modelCompany                    = new Company;
		$modelVehicleCharacteristicArray = array();
		$modelCharacteristicTypeArray    = CharacteristicType::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'related_field' => ''));
		$modelPhotoArray                 = array();
		$modelServiceArray               = array();

		for ($i = 1; $i <= sizeof($modelCharacteristicTypeArray); $i++) {
			$modelVehicleCharacteristicArray[] = new VehicleCharacteristic;
		}

		for ($i = 1; $i <= 5; $i++) {
			$modelPhotoArray[] = new Photo;
		}

		for ($i = 1; $i <= 10; $i++) {
			$modelServiceArray[] = new ServicingData;
		}

		if (isset($_POST['Vehicle'])) {

			// Valid flag for validating multiple models
			$formValid = true;

			// Check if User already exists and is logged in
			if (isset(Yii::app()->user->id)) {

				$partyId = User::model()->findByPk(Yii::app()->user->id)->partyid;

			} else {

				$modelParty->save();
				$partyId = $modelParty->partyid;

				if ($_POST['optionsPhysicalCompany'] == 'physical') {
					$modelPhysicalPerson->attributes = $_POST['PhysicalPerson'];
					$modelPhysicalPerson->partyid    = $partyId;
					$email                           = $modelPhysicalPerson->email;
					if ($formValid && $modelPhysicalPerson->validate())
						$modelPhysicalPerson->save(false);
					else
						$formValid = false;
					$modelPartyRole->roleid = 1;
				} else {
					$modelCompany->attributes = $_POST['Company'];
					$modelCompany->partyid    = $partyId;
					$email                    = $modelCompany->email;
					if ($formValid && $modelCompany->validate())
						$modelCompany->save(false);
					else
						$formValid = false;
					$modelPartyRole->roleid = 3;
				}

			}

			// Save Vehicle model
			$modelVehicle->scenario = 'createAdvertisement';
			$modelVehicle->attributes     = $_POST['Vehicle'];
			$modelVehicle->vehicle_typeid = $vehicleTypeId;
			if ($modelVehicle->validate())
				$modelVehicle->save(false);
			else
				$formValid = false;
			$vehicleId = $modelVehicle->vehicleid;

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
			if ($formValid && $modelUser->validate())
				$modelUser->save(false);
			else
				$formValid = false;
			$userId = $modelUser->userid;

			// Save VehicleAdvertisement model
			$modelVehicleAdvertisement->attributes   = $_POST['VehicleAdvertisment'];
			$modelVehicleAdvertisement->vehicleid    = $vehicleId;
			$modelVehicleAdvertisement->created_date = date('Y-m-d H:i:s');
			$modelVehicleAdvertisement->active       = 1;
			$modelVehicleAdvertisement->advertiser   = $partyId;
//			die(var_dump($modelVehicleAdvertisement->attributes, $modelVehicleAdvertisement->validate(), $modelVehicleAdvertisement->getErrors()));
			if ($formValid && $modelVehicleAdvertisement->validate())
				$modelVehicleAdvertisement->save(false);
			else
				$formValid = false;
			$vehicleAdvertisementId = $modelVehicleAdvertisement->vehicle_advertismentid;

			// Dynamic vehicle type model based on Vehicle Type ID
			if ($model != '') {
				$model->vehicleid  = $vehicleId;
				$model->attributes = $_POST[$modelClass];
				if ($formValid && $model->validate())
					$model->save(false);
				else
					$formValid = false;
			}

			// Save VehicleCharacteristic model
			foreach ($modelVehicleCharacteristicArray as $i => $vehicleCharacteristic) {
				$characteristicId = $_POST['VehicleCharacteristic'][$i]['characteristicid'];
				if ($characteristicId != '') {
					$vehicleCharacteristic->vehicleid        = $modelVehicle->vehicleid;
					$vehicleCharacteristic->characteristicid = $characteristicId;
					if ($formValid && $vehicleCharacteristic->validate())
						$vehicleCharacteristic->save(false);
					else
						$formValid = false;
				}
			}

			// Save Photo model array
			foreach ($modelPhotoArray as $i => $photo) {

				$fileName          = $_FILES['Photo']['name'][$i]['file_name'];
				$imageExtensionTmp = explode('.', $fileName);
				$imageExtension    = $imageExtensionTmp[sizeof($imageExtensionTmp) - 1];
				if ($fileName != '') {
					$photo->vehicle_advertismentid = $vehicleAdvertisementId;
					$photo->file_name              = $imageExtension;
					if ($formValid && $photo->validate()) {
						$photo->save(false);
						$imageFile          = 'images/vehicle/normal/vehicle-' . $vehicleAdvertisementId . '.' . $imageExtension;
						$imageFileThumb     = 'images/vehicle/thumb/vehicleThumb-' . $vehicleAdvertisementId . '.' . $imageExtension;
						$imageFileTinyThumb = 'images/vehicle/tinyThumb/vehicleTinyThumb-' . $vehicleAdvertisementId . '.' . $imageExtension;
						$image              = CUploadedFile::getInstanceByName("Photo[$i][file_name]");
						$image->saveAs($imageFile);
						$imageResized = new Image($imageFile);
						$imageResized->resize('100', '100');
						$imageResized->save($imageFileThumb);
						$imageResized->resize('60', '60');
						$imageResized->save($imageFileTinyThumb);
					} else {
						$formValid = false;
					}
				}
			}

			// Save ServicingData model array
			foreach ($modelServiceArray as $i => $servicingData) {
				if ($_POST['ServicingData'][$i]['serviceid'] != '' || $_POST['ServicingData'][$i]['service_name'] != '') {
					$servicingData->attributes = $_POST['ServicingData'][$i];
					$servicingData->vehicleid  = $vehicleId;
					if ($formValid && $servicingData->validate())
						$servicingData->save(false);
					else
						$formValid = false;
				}
			}

			if ($formValid)
				$this->redirect(array('/user/sendValidationMail', 'userId' => $userId));

		}

		// Render a view
		$this->render('create', array(
			'vehicleTypeId'                   => $vehicleTypeId,
			'vehicleType'                     => $vehicleType,
			'vehicleTypeName'                 => $vehicleTypeName,
			'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
			'modelPhysicalPerson'             => $modelPhysicalPerson,
			'modelCompany'                    => $modelCompany,
			'model'                           => $model,
			'modelVehicle'                    => $modelVehicle,
			'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
			'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
			'modelPhotoArray'                 => $modelPhotoArray,
			'modelServiceArray'               => $modelServiceArray,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['VehicleAdvertisment'])) {
			$model->attributes = $_POST['VehicleAdvertisment'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->vehicle_advertismentid));
		}

		$this->render('update', array(
			'model' => $model,
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

	public function tempErrorHandler($errno, $errstr)
	{
//			Yii::log(...);
		echo "Error occurred";
		Yii::app()->end();
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($vehicleTypeId = 1)
	{

		$vehicleTypeName      = ucwords(VehicleType::model()->findByPk($vehicleTypeId)->vehicle_type);
		$vehicleTypeNameCamel = lcfirst(str_replace(' ', '', $vehicleTypeName));

		$model = new SearchAdvertisment('search');

		$model->unsetAttributes(); // clear any default values

		$model->vehicle_typeid = $vehicleTypeId;

		if (isset($_POST['yt0'])) {
			$model->makeid   = $_POST['make'];
			$model->modelid  = $_POST['model'];
			$model->yearFrom = $_POST['yearFrom'];
			$model->yearTo   = $_POST['yearTo'];
		}

		$this->render('index', array(
			'dataProvider'         => $model->search(),
			'vehicleTypeName'      => $vehicleTypeName,
			'vehicleTypeNameCamel' => $vehicleTypeNameCamel,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new VehicleAdvertisment('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['VehicleAdvertisment']))
			$model->attributes = $_GET['VehicleAdvertisment'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return VehicleAdvertisment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = VehicleAdvertisment::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param VehicleAdvertisment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'vehicle-advertisment-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTest()
	{
		var_dump(Helper::getRoleList(Yii::app()->user->getState('userRoles')));
//		Yii::app()->language = 'en';
//		echo Yii::t('l10n', 'label');
	}

}
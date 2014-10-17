<?php

Yii::import('application.extensions.image.Image');

class CarController extends Controller
{

	const VEHICLE_TYPE_CAR = 'car';

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
				'actions' => array('index', 'view', 'create', 'updateModelDropdown'),
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

		$vehicleTypeId                   = VehicleType::model()->findByAttributes(array('vehicle_type' => self::VEHICLE_TYPE_CAR))->vehicle_typeid;
		$modelVehicle                    = new Vehicle;
		$modelVehicle->vehicle_typeid    = $vehicleTypeId;
		$modelVehicleAdvertisement       = new VehicleAdvertisment;
		$modelParty                      = new Party;
		$modelPartyRole                  = new PartyRole;
		$modelUser                       = new User;
		$modelPhysicalPerson             = new PhysicalPerson;
		$modelCompany                    = new Company;
		$modelCar                        = new Car;
		$modelVehicleCharacteristicArray = array();
		$modelCharacteristicTypeArray    = CharacteristicType::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'related_field' => ''));
		$modelPhotoArray                 = array();
		$modelService                    = new ServicingData;

		for ($i = 1; $i <= sizeof($modelCharacteristicTypeArray); $i++) {
			$modelVehicleCharacteristicArray[] = new VehicleCharacteristic;
		}

		for ($i = 0; $i < 5; $i++) {
			$modelPhotoArray[] = new Photo;
		}

//		$this->performAjaxValidation(array($modelVehicle, $modelCar, $modelPhysicalPerson, $modelCompany, $modelVehicleAdvertisement));

		if (isset($_POST['Vehicle']))
		{

			$modelParty->save();
			$partyId = $modelParty->partyid;

			$modelVehicle->attributes     = $_POST['Vehicle'];
			$modelVehicle->vehicle_typeid = $vehicleTypeId;
			$modelCar->attributes         = $_POST['Car'];

			if ($_POST['optionsPhysicalCompany'] == 'physical') {
				$modelPhysicalPerson->attributes = $_POST['PhysicalPerson'];
				$modelPhysicalPerson->partyid    = $partyId;
				$email = $modelPhysicalPerson->email;
				if ($modelPhysicalPerson->validate())
					$modelPhysicalPerson->save(false);
				$modelPartyRole->roleid = 1;
			} else {
				$modelCompany->attributes = $_POST['Company'];
				$modelCompany->partyid    = $partyId;
				$email = $modelCompany->email;
				if ($modelCompany->validate())
					$modelCompany->save(false);
				$modelPartyRole->roleid = 3;
			}

			$modelPartyRole->partyid = $partyId;
			$modelPartyRole->active      = 1;
			$modelPartyRole->active_from = date('Y-m-d');
			$modelPartyRole->active_to   = date('Y-m-d', strtotime('+1 year'));
			if ($modelPartyRole->validate())
				$modelPartyRole->save(false);

			$modelUser->username = $email;
			$modelUser->partyid = $partyId;
			if($modelUser->validate())
				$modelUser->save(false);
			$userId = $modelUser->userid;

			if ($modelVehicle->validate()) {
				if ($modelVehicle->save(false)) {
					$vehicleId                               = $modelVehicle->vehicleid;
					$modelVehicleAdvertisement->attributes   = $_POST['VehicleAdvertisment'];
					$modelVehicleAdvertisement->vehicleid    = $vehicleId;
					$modelVehicleAdvertisement->created_date = date('Y-m-d H:i:s');
					$modelVehicleAdvertisement->active       = 1;
					$modelVehicleAdvertisement->advertiser   = $partyId;
					$modelVehicleAdvertisement->save(false);
					$vehicleAdvertisementId = $modelVehicleAdvertisement->vehicle_advertismentid;
					$modelCar->vehicleid    = $vehicleId;

					if ($modelCar->validate()) {
						if ($modelCar->save(false)) {
							foreach ($modelVehicleCharacteristicArray as $i => $vehicleCharacteristic) {
								$characteristicId = $_POST['VehicleCharacteristic'][$i]['characteristicid'];
								if ($characteristicId != '') {
									$vehicleCharacteristic->vehicleid        = $modelVehicle->vehicleid;
									$vehicleCharacteristic->characteristicid = $characteristicId;
									if ($vehicleCharacteristic->validate())
										$vehicleCharacteristic->save(false);
								}
							}

							foreach ($modelPhotoArray as $i => $photo) {

								$fileName          = $_FILES['Photo']['name'][$i]['file_name'];
								$imageExtensionTmp = explode('.', $fileName);
								$imageExtension    = $imageExtensionTmp[sizeof($imageExtensionTmp) - 1];
								if ($fileName != '') {
									$photo->vehicle_advertismentid = $vehicleAdvertisementId;
									$photo->file_name              = $imageExtension;
									if ($photo->validate()) {
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
									}
								}
							}

							if ($_POST['ServicingData']['serviceid'] != '' || $_POST['ServicingData']['service_name'] != '') {
								$modelService->attributes = $_POST['ServicingData'];
								$modelService->vehicleid  = $vehicleId;
								if ($modelService->validate())
									$modelService->save(false);
							}
						}
					}
				}
				$this->redirect(array('/user/sendValidationMail', 'userId' => $userId));
			}
		}

		$this->render('create', array(
			'vehicleTypeId'                   => $vehicleTypeId,
			'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
			'modelPhysicalPerson'             => $modelPhysicalPerson,
			'modelCompany'                    => $modelCompany,
			'model'                           => $modelCar,
			'modelVehicle'                    => $modelVehicle,
			'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
			'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
			'modelPhotoArray'                 => $modelPhotoArray,
			'modelService'                    => $modelService,
		));

	}

	public function actionUpdateModelDropdown()
	{

		$data = VehicleModel::model()->findAll('makeid = :makeId', array(':makeId' => (int)$_POST['makeId']));
		$data = CHtml::listData($data, 'modelid', 'model_name');

		echo '<option value="">Select Model</option>';
		foreach ($data as $value => $make_name)
			echo CHtml::tag('option', array('value' => $value), CHtml::encode($make_name), true);

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

		if (isset($_POST['Car'])) {
			$model->attributes = $_POST['Car'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->carid));
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

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		$model = new SearchAdvertisment('search');

		$model->unsetAttributes(); // clear any default values

		if (isset($_POST['yt0'])) {
			$model->makeid   = $_POST['make'];
			$model->modelid  = $_POST['model'];
			$model->yearFrom = $_POST['yearFrom'];
			$model->yearTo   = $_POST['yearTo'];
		}

		$this->render('index', array(
			'dataProvider' => $model->search()
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Car('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Car']))
			$model->attributes = $_GET['Car'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Car the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Car::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Car $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'car-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionTest()
	{
		/*
		 * Create Party
		 */
//		$modelParty              = new Party();
//		$modelParty->isNewRecord = true;
//		var_dump($modelParty, $modelParty->validate(), $modelParty->getErrors());
//		$modelParty->save();
//		var_dump($modelParty);
//		$modelParty->partyid = null;

		/*
		 * Create Vehicle
		 */
//		$modelVehicle                 = new Vehicle;
//		$modelVehicle->isNewRecord    = true;
//		$modelVehicle->vin            = 12345;
//		$modelVehicle->modelid        = 6;
//		$vehicleTypeId                = VehicleType::model()->findByAttributes(array('vehicle_type' => self::VEHICLE_TYPE_CAR))->vehicle_typeid;
//		$modelVehicle->vehicle_typeid = $vehicleTypeId;
//		var_dump($modelVehicle, $modelVehicle->validate(), $modelVehicle->getErrors());
//		$modelVehicle->save();
//		var_dump($modelVehicle);
//		$modelVehicle->vehicleid = null;

		/*
		 * Create VehicleAdvertisement
		 */
//		$modelVehicleAdvertisement               = new VehicleAdvertisment();
//		$modelVehicleAdvertisement->isNewRecord  = true;
//		$modelVehicleAdvertisement->vehicleid    = 17;
//		$modelVehicleAdvertisement->created_date = date('Y-m-d H:i:s');
//		$modelVehicleAdvertisement->active       = 1;
//		$modelVehicleAdvertisement->advertiser   = 139;
//		$modelVehicleAdvertisement->description  = 'blah';
//		var_dump($modelVehicleAdvertisement, $modelVehicleAdvertisement->validate(), $modelVehicleAdvertisement->getErrors());
//		$modelVehicleAdvertisement->save();
//		var_dump($modelVehicleAdvertisement);
//		$modelVehicleAdvertisement->vehicle_advertismentid = null;

		/*
		 * Create Car
		 */
//		$modelCar              = new Car;
//		$modelCar->isNewRecord = true;
//		$modelCar->vehicleid   = 17;
//		var_dump($modelCar, $modelCar->validate(), $modelCar->getErrors());
//		$modelCar->save();
//		var_dump($modelCar);
//		$modelCar->carid = null;

		/*
		 * Create PhysicalPerson
		 */
		$modelPhysicalPerson              = new PhysicalPerson();
		$modelPhysicalPerson->isNewRecord = true;
		$modelPhysicalPerson->partyid     = 139;
		$modelPhysicalPerson->first_name  = 'First';
		$modelPhysicalPerson->last_name   = 'Last';
		$modelPhysicalPerson->mobile      = 'Mobile';
		$modelPhysicalPerson->email       = 'email@mail.com';
		$modelPhysicalPerson->city        = 'City';
		var_dump($modelPhysicalPerson, $modelPhysicalPerson->validate(), $modelPhysicalPerson->getErrors());
		$modelPhysicalPerson->save();
		var_dump($modelPhysicalPerson);
		$modelPhysicalPerson->partyid = null;

	}

}

<?php

Yii::import('application.extensions.image.Image');

class BoatController extends Controller
{

	const VEHICLE_TYPE_BOAT = 'boat';

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
				'actions' => array('index', 'view', 'create'),
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

		$vehicleTypeId                   = VehicleType::model()->findByAttributes(array('vehicle_type' => self::VEHICLE_TYPE_BOAT))->vehicle_typeid;
		$modelVehicle                    = new Vehicle;
		$modelVehicle->vehicle_typeid    = $vehicleTypeId;
		$modelVehicleAdvertisement       = new VehicleAdvertisment;
		$modelBoat                       = new Boat;
		$modelParty                      = new Party;
		$modelPhysicalPerson             = new PhysicalPerson;
		$modelCompany                    = new Company;
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

//		$this->performAjaxValidation(array($modelVehicle, $modelBoat, $modelPhysicalPerson, $modelCompany, $modelVehicleAdvertisement));

		if (isset($_POST['Vehicle']))
		{

			$modelParty->save();
			$partyId = $modelParty->partyid;

			$modelVehicle->attributes     = $_POST['Vehicle'];
			$modelVehicle->vehicle_typeid = $vehicleTypeId;
			$modelBoat->attributes        = $_POST['Boat'];

			if ($_POST['optionsPhysicalCompany'] == 'physical') {
				$modelPhysicalPerson->attributes = $_POST['PhysicalPerson'];
				$modelPhysicalPerson->partyid    = $partyId;
				if ($modelPhysicalPerson->validate())
					$modelPhysicalPerson->save(false);
			} else {
				$modelCompany->attributes = $_POST['Company'];
				$modelCompany->partyid    = $partyId;
				if ($modelCompany->validate())
					$modelCompany->save(false);
			}

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
					$modelBoat->vehicleid = $vehicleId;

					if($modelBoat->validate()) {
						if ($modelBoat->save(false)) {
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

								$fileName = $_FILES['Photo']['name'][$i]['file_name'];
								$imageExtensionTmp = explode('.', $fileName);
								$imageExtension = $imageExtensionTmp[sizeof($imageExtensionTmp) - 1];
								if ($fileName != '') {
									$photo->vehicle_advertismentid = $vehicleAdvertisementId;
									$photo->file_name        = $imageExtension;
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
								$modelService->vehicleid = $vehicleId;
								if ($modelService->validate())
									$modelService->save();
							}
						}
					}
				}
				$this->redirect(array('/vehicleAdvertisment/index'), array('vehicleTypeId' => $vehicleTypeId));
			}
		}

		$this->render('create', array(
			'vehicleTypeId'                   => $vehicleTypeId,
			'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
			'modelPhysicalPerson'             => $modelPhysicalPerson,
			'modelCompany'                    => $modelCompany,
			'modelBoat'                       => $modelBoat,
			'modelVehicle'                    => $modelVehicle,
			'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
			'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
			'modelPhotoArray'                 => $modelPhotoArray,
			'modelService'                    => $modelService,
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

		if (isset($_POST['Boat'])) {
			$model->attributes = $_POST['Boat'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->boatid));
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

		$criteria = new CDbCriteria;
		$criteria->addCondition('vehicle_typeid = 5');
		if (isset($_POST['yt0'])) {
			$criteria->compare('modelid', $_POST['model']);
			$criteria->compare('fuel_typeid', $_POST['fuel']);
			if ($_POST['year_from'] != '' || $_POST['year_to'] != '') {
				$yearFrom = ($_POST['year_from'] == '') ? date('Y') : $_POST['year_from'];
				$yearTo   = ($_POST['year_to'] == '') ? date('Y') : $_POST['year_to'];
				$criteria->addBetweenCondition('production_year', $yearFrom, $yearTo);
			}
		}

		$dataProvider = new CActiveDataProvider('Vehicle', array(
			'criteria' => $criteria,
		));

		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Boat('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Boat']))
			$model->attributes = $_GET['Boat'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Boat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Boat::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Boat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'boat-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

<?php

class TruckController extends Controller
{

	const VEHICLE_TYPE_TRUCK = 'trucks';

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
				'actions' => array('index', 'view'),
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

		$vehicleTypeId                   = VehicleType::model()->findByAttributes(array('vehicle_type' => self::VEHICLE_TYPE_TRUCK))->vehicle_typeid;
		$modelVehicle                    = new Vehicle;
		$modelVehicle->vehicle_typeid    = $vehicleTypeId;
		$modelVehicleAdvertisement       = new VehicleAdvertisment();
		$modelTruck                      = new Truck;
		$modelParty                      = new Party();
		$modelPhysicalPerson             = new PhysicalPerson();
		$modelCompany                    = new Company();
		$modelVehicleCharacteristicArray = array();
		$modelCharacteristicTypeArray    = CharacteristicType::model()->findAllByAttributes(array('vehicle_typeid' => array(0, $vehicleTypeId), 'related_field' => ''));

		for ($i = 1; $i <= sizeof($modelCharacteristicTypeArray); $i++) {
			$modelVehicleCharacteristicArray[] = new VehicleCharacteristic;
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Vehicle']) && isset($_POST['Truck'])) {
			// Add Vehicle first
			$modelVehicle->attributes     = $_POST['Vehicle'];
			$modelVehicle->vehicle_typeid = $vehicleTypeId;
			$modelTruck->attributes       = $_POST['Truck'];
			$modelParty->save();
			$partyId = $modelParty->partyid;

			if ($_POST['optionsPhysicalCompany'] == 'physical') {
				$modelPhysicalPerson->attributes = $_POST['PhysicalPerson'];
				$modelPhysicalPerson->partyid    = $partyId;
				$modelPhysicalPerson->save();
			} else {
				$modelCompany->attributes = $_POST['Company'];
				$modelCompany->partyid    = $partyId;
				$modelCompany->save();
			}

			if ($modelVehicle->validate() && $modelTruck->validate()) {
				if ($modelVehicle->save()) {
					$vehicleId                               = $modelVehicle->vehicleid;
					$modelVehicleAdvertisement->attributes   = $_POST['VehicleAdvertisment'];
					$modelVehicleAdvertisement->vehicleid    = $vehicleId;
					$modelVehicleAdvertisement->created_date = date('Y-m-d H:i:s');
					$modelVehicleAdvertisement->active       = 1;
					$modelVehicleAdvertisement->advertiser   = $partyId;
					$modelVehicleAdvertisement->save();
					$modelTruck->vehicleid = $vehicleId;

					if ($modelTruck->save()) {
						foreach ($modelVehicleCharacteristicArray as $i => $vehicleCharacteristic) {
							$characteristicId = $_POST['VehicleCharacteristic'][$i]['characteristicid'];
							if ($characteristicId != '') {
								$vehicleCharacteristic->vehicleid        = $modelVehicle->vehicleid;
								$vehicleCharacteristic->characteristicid = $characteristicId;
								if ($vehicleCharacteristic->validate())
									$vehicleCharacteristic->save();
							}
						}
						$this->redirect(array('index'));
					}
				}
			}
		}

		$this->render('create', array(
			'modelVehicleAdvertisement'       => $modelVehicleAdvertisement,
			'modelPhysicalPerson'             => $modelPhysicalPerson,
			'modelCompany'                    => $modelCompany,
			'modelTruck'                      => $modelTruck,
			'modelVehicle'                    => $modelVehicle,
			'modelCharacteristicTypeArray'    => $modelCharacteristicTypeArray,
			'modelVehicleCharacteristicArray' => $modelVehicleCharacteristicArray,
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

		if (isset($_POST['Truck'])) {
			$model->attributes = $_POST['Truck'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->truckid));
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
		$dataProvider = new CActiveDataProvider('Truck');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Truck('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Truck']))
			$model->attributes = $_GET['Truck'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Truck the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Truck::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Truck $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'truck-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

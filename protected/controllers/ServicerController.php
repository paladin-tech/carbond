<?php

class ServicerController extends Controller
{

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
				'actions' => array('index', 'view', 'create', 'addServicingData', 'brands', 'listByBrand'),
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

	public function actionBrands($vehicleTypeId = 1)
	{

		$model                = new VehicleMake('search');
		$model->vehicleTypeId = $vehicleTypeId;

		$this->render('brands', array(
			'dataProvider'  => $model->search(),
			'vehicleTypeId' => $vehicleTypeId,
		));

	}

	public function actionListByBrand($makeId, $vehicleTypeId = 1)
	{

		$this->render('listByBrand');

	}

	public function actionAddServicingData($vehicleTypeId = 1)
	{

		$modelVehicle      = new Vehicle;
		$modelServiceArray = array();

		for ($i = 1; $i <= 10; $i++) {
			$modelServiceArray[] = new ServicingData;
		}

		$vehicleTypeData = Helper::getVehicleTypeData($vehicleTypeId);
		$newModel        = false;

		if (isset($_POST['yt0'])) {
			$searched     = true;
			$modelVehicle = Vehicle::model()->findByAttributes(array('vin' => $_POST['vin']));
			if (empty($modelVehicle)) {
				$modelVehicle = new Vehicle;
				$newModel     = true;
			} else {
				foreach ($modelVehicle->servicingDatas as $i => $serviceData) {
					$modelServiceArray[$i] = $serviceData;
				}
			}
		} else {
			$searched = false;
		}

		if (isset($_POST['Vehicle'])) {

			// Valid flag for validating multiple models
			$formValid = true;

			$modelVehicle->scenario       = 'createServiceData';
			$modelVehicle->attributes     = $_POST['Vehicle'];
			$modelVehicle->vehicleid      = $_POST['Vehicle']['vehicleid'];
			$modelVehicle->vehicle_typeid = $vehicleTypeId;

			if ($newModel) {
				if ($modelVehicle->validate())
					$modelVehicle->save(false);
				else
					$formValid = false;
			}
			$vehicleId = $modelVehicle->vehicleid;

			// Save ServicingData model array
			foreach ($modelServiceArray as $i => $servicingData) {
				if ($_POST['ServicingData'][$i]['serviceid'] != '' || $_POST['ServicingData'][$i]['service_name'] != '') {
					if ($_POST['ServicingData'][$i]['servicing_dataid'] != '')
						$servicingData = ServicingData::model()->findByPk($_POST['ServicingData'][$i]['servicing_dataid']);
					$servicingData->attributes = $_POST['ServicingData'][$i];
					$servicingData->vehicleid  = $vehicleId;

					if ($formValid && $servicingData->validate())
						$servicingData->save(false);
					else
						$formValid = false;
				}
			}

			if ($formValid)
				$this->redirect(array('servicer/addServicingData', 'vehicleTypeId' => $vehicleTypeId));

		}

		$this->render('addServicingData', array(
			'vehicleTypeId'     => $vehicleTypeId,
			'modelVehicle'      => $modelVehicle,
			'vehicleTypeData'   => $vehicleTypeData,
			'modelServiceArray' => $modelServiceArray,
			'newModel'          => $newModel,
			'searched'          => $searched,
		));

	}

}
<?php

class InsuranceHouseController extends Controller
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
				'actions' => array('index', 'view', 'create', 'addDamageData'),
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
	public function emptyObj($obj) {
		foreach ($obj as $k) {
			return false;
		}
		return true;
	}
	public function actionAddDamageData($vehicleTypeId = 1)
	{

		$modelVehicle     = new Vehicle;
		$modelDamageArray = array();

		for ($i = 1; $i <= 10; $i++) {
			$modelDamageArray[] = new DamageData();
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
				foreach ($modelVehicle->damageDatas as $i => $damageData) {
					$modelDamageArray[$i] = $damageData;
				}
			}
		} else {
			$searched = false;
		}

		if (isset($_POST['Vehicle'])) {

			// Valid flag for validating multiple models
			$formValid = true;

//			$transaction = Yii::app()->db->beginTransaction();

			$modelVehicle->scenario       = 'createServiceData';
			$modelVehicle->attributes     = $_POST['Vehicle'];
			$modelVehicle->vehicleid      = $_POST['Vehicle']['vehicleid'];
			$modelVehicle->vehicle_typeid = $vehicleTypeId;
			if ($_POST['Vehicle']['vehicleid'] == '') {
				if ($modelVehicle->validate())
					$modelVehicle->save(false);
				else
					$formValid = false;
			}
			$vehicleId = ($modelVehicle->vehicleid == '') ? Yii::app()->db->getLastInsertID() : $modelVehicle->vehicleid;

			// Save ServicingData model array
			foreach ($modelDamageArray as $i => $damageData) {
				if ($_POST['DamageData'][$i]['insuranceid'] != '' || $_POST['DamageData'][$i]['insurance_name'] != '') {
					if ($_POST['DamageData'][$i]['damage_dataid'] != '')
						$damageData = DamageData::model()->findByPk($_POST['DamageData'][$i]['damage_dataid']);
					$damageData->attributes = $_POST['DamageData'][$i];
					$damageData->vehicleid  = $vehicleId;
					if ($formValid && $damageData->validate())
						$damageData->save(false);
					else
						$formValid = false;
				}
			}

			if ($formValid)
			{
//				$transaction->commit();
				$this->redirect(array('insuranceHouse/addDamageData', 'vehicleTypeId' => $vehicleTypeId));
			} else {
//				$transaction->rollback();
			}

		}

		$this->render('addDamageData', array(
			'vehicleTypeId'    => $vehicleTypeId,
			'modelVehicle'     => $modelVehicle,
			'vehicleTypeData'  => $vehicleTypeData,
			'modelDamageArray' => $modelDamageArray,
			'newModel'         => $newModel,
			'searched'         => $searched,
		));

	}

}
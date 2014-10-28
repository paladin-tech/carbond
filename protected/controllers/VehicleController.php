<?php

class VehicleController extends Controller
{

	const VIN_SEARCH_LIMIT = 3;

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
				'actions' => array('index', 'view', 'searchByVin', 'checkVin'),
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
		$model = new Vehicle;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Vehicle'])) {
			$model->attributes = $_POST['Vehicle'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->vehicleid));
		}

		$this->render('create', array(
			'model' => $model,
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

		if (isset($_POST['Vehicle'])) {
			$model->attributes = $_POST['Vehicle'];
			if ($model->save())
				$this->redirect(array('view', 'id' => $model->vehicleid));
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
		$dataProvider = new CActiveDataProvider('Vehicle');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionSearchByVin()
	{

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		$searchAllowed = !Yii::app()->user->isGuest;
		$searchNotAllowedMessage = 'You are not allowed to make VIN database queries. Please login.';

		if (isset($_POST['yt0'])) {

			$criteria            = new CDbCriteria;
			$criteria->condition = 'search_date >= (NOW() - INTERVAL 1 MONTH)';
			$searchLogCheck      = count(VinSearchLog::model()->findAll(array(
				'condition' => 'search_date >= (NOW() - INTERVAL 1 MONTH) AND userid = :userId',
				'params'    => array(':userId' => Yii::app()->user->id),
			)));

			if ($searchLogCheck >= $this::VIN_SEARCH_LIMIT) {
				$searchNotAllowedMessage = 'You already made ' . $searchLogCheck . ' queries, exceeding your monthly limit.';
				$searchAllowed           = false;
				$model                   = 'notSet';
			}

			if($searchAllowed) {
				$model         = Vehicle::model()->findByAttributes(array('vin' => $_POST['vin']));
				$servicingData = (isset($model)) ? new CArrayDataProvider($model->servicingDatas, array('keyField' => 'servicing_dataid')) : '';

				// Save VIN Search Log
				$success                   = (isset($model)) ? 1 : 0;
				$vinSearchLog              = new VinSearchLog;
				$vinSearchLog->userid      = Yii::app()->user->id;
				$vinSearchLog->search_date = date('Y-m-d H:i:s');
				$vinSearchLog->vin         = $_POST['vin'];
				$vinSearchLog->success     = $success;
				$vinSearchLog->save();

				$this->render('searchByVin', array(
					'searchAllowed'           => $searchAllowed,
					'searchNotAllowedMessage' => $searchNotAllowedMessage,
					'model'                   => $model,
					'servicingData'           => $servicingData,
				));
				Yii::app()->end();
			}

		}

		$this->render('searchByVin', array(
			'searchAllowed'           => $searchAllowed,
			'searchNotAllowedMessage' => $searchNotAllowedMessage,
			'model'                   => 'notSet',
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model = new Vehicle('search');
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['Vehicle']))
			$model->attributes = $_GET['Vehicle'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionCheckVin()
	{

		$VIN     = $_POST['vin'];
		$vehicle = Vehicle::model()->findByAttributes(array('vin' => $VIN));

		if (strlen($VIN) == 17) {
			$formatValid = true;
			$vinPattern  = substr($VIN, 0, 3);
			$make        = MakeVin::model()->findByAttributes(array('vin_pattern' => $vinPattern));
			if (!empty($make))
				$makeVin = $make->makeid;
		} else {
			$formatValid = false;
		}

		if (!empty($vehicle)) {
			$criteria            = new CDbCriteria;
			$criteria->condition = ':vehicleId = vehicleid AND :date <= valid_to';
			$criteria->params    = array(':date' => date('Y-m-d'), ':vehicleId' => $vehicle->vehicleid);
			$advertisement       = VehicleAdvertisment::model()->findAll($criteria);
			$activeAds           = (!empty($advertisement));
			$response            = array(
				'formatValid' => true,
				'vinCheck'    => true,
				'activeAds'   => $activeAds,
				'modelId'     => $vehicle->modelid,
				'makeId'      => (isset($makeVin)) ? $makeVin : $vehicle->model->makeid
			);
		} else {
			$response = array(
				'formatValid' => $formatValid,
				'vinCheck'    => false,
				'activeAds'   => false,
				'makeId'      => (isset($makeVin)) ? $makeVin : ''
			);
		}

		echo json_encode($response);

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Vehicle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Vehicle::model()->findByPk($id);
		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Vehicle $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'vehicle-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}

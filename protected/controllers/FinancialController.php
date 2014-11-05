<?php

class FinancialController extends Controller
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
				'actions' => array('index', 'view'),
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

	public function actionIndex()
	{

		$model         = new Company('searchFinancialCompanies');
		$model->roleId = 13;

		if (isset($_POST['yt0'])) {
			$model->roleId    = $_POST['FinancialType'];
			$model->countryId = $_POST['country'];
			$model->city      = $_POST['city'];
		}

		$this->render('index', array(
			'dataProvider' => $model->searchFinancialCompanies(),
			'selectedRole' => $model->roleId,
		));

	}

	public function actionView($id)
	{

		$model            = Company::model()->findByPk($id);
		$SVMT             = ServicerVehicleMakeType::model()->findAllByAttributes(array('servicerid' => $id));
		$servicerMakeList = array();
		foreach ($SVMT as $item) {
			$servicerMakeList[] = $item->makeid;
		}
		$serviceAdvertisementData = ServiceAdvertisment::model()->findAllByAttributes(array('advertiser' => $id));

		$this->render('view', array(
			'model'                    => $model,
			'servicerMakeList'         => $servicerMakeList,
			'serviceAdvertisementData' => $serviceAdvertisementData,
		));
	}

}
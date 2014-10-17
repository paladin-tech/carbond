<?php

/**
 * This is the model class for table "search_advertisment".
 *
 * The followings are the available columns in table 'search_advertisment':
 * @property integer $vehicleid
 * @property integer $modelid
 * @property string $model_name
 * @property integer $makeid
 * @property string $make_name
 */
class SearchAdvertisment extends CActiveRecord
{

	public $yearFrom;
	public $yearTo;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'search_advertisment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicleid, modelid', 'required'),
			array('vehicleid, modelid, makeid', 'numerical', 'integerOnly' => true),
			array('model_name, make_name', 'length', 'max' => 45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('modelid, model_name, makeid, make_name', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicleid'  => 'Vehicle ID',
			'modelid'    => 'Model ID',
			'model_name' => 'Model Name',
			'makeid'     => 'Make ID',
			'make_name'  => 'Make Name',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{

		$criteria = new CDbCriteria;

		$criteria->compare('modelid', $this->modelid);
		$criteria->compare('makeid', $this->makeid);
		$criteria->compare('vehicle_typeid', $this->vehicle_typeid);
//		$criteria->addBetweenCondition('production_year', $this->yearFrom, $this->yearTo);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SearchAdvertisment the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

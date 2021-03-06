<?php

/**
 * This is the model class for table "vehicle_make".
 *
 * The followings are the available columns in table 'vehicle_make':
 * @property integer $makeid
 * @property string $make_name
 *
 * The followings are the available model relations:
 * @property MakeVin[] $makeVins
 * @property ServicerVehicleMakeType[] $servicerVehicleMakeTypes
 * @property VehicleType[] $vehicleTypes
 * @property VehicleModel[] $vehicleModels
 */
class VehicleMake extends CActiveRecord
{

	public $vehicleTypeId;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_make';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('make_name', 'length', 'max' => 45),
			array('make_name', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('makeid, make_name, vehicleTypeId', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'makeVins'                 => array(self::HAS_MANY, 'MakeVin', 'makeid'),
			'servicerVehicleMakeTypes' => array(self::HAS_MANY, 'ServicerVehicleMakeType', 'makeid'),
			'vehicleTypes'             => array(self::MANY_MANY, 'VehicleType', 'vehicle_make_type(vehicle_makeid, vehicle_typeid)'),
			'vehicleModels'            => array(self::HAS_MANY, 'VehicleModel', 'makeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'makeid'    => 'Make ID',
			'make_name' => 'Make Name',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->with = array('vehicleTypes');
		$criteria->together = true;
		$criteria->compare('vehicleTypes.vehicle_typeid', $this->vehicleTypeId);
		$criteria->compare('makeid', $this->makeid);
		$criteria->compare('make_name', $this->make_name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleMake the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

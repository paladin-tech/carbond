<?php

/**
 * This is the model class for table "vehicle_advertisment".
 *
 * The followings are the available columns in table 'vehicle_advertisment':
 * @property integer $vehicle_advertismentid
 * @property integer $vehicleid
 * @property string $created_date
 * @property string $last_change
 * @property string $valid_to
 * @property integer $active
 * @property integer $advertiser
 * @property string $description
 * @property integer $price
 *
 * The followings are the available model relations:
 * @property Photo[] $photos
 * @property Party $advertiser0
 * @property Vehicle $vehicle
 */
class VehicleAdvertisment extends CActiveRecord
{

	public $vehicleTypeId = 1;
	public $makeId;
	public $modelId;
	public $yearFrom;
	public $yearTo;
	public $fuelTypeId;
	public $sort;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_advertisment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price, advertiser', 'required'),
			array('vehicleid, active, advertiser, price', 'numerical', 'integerOnly' => true),
			array('created_date, last_change, valid_to, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicle_advertismentid, vehicleid, created_date, last_change, valid_to, active, advertiser, description, price', 'safe', 'on' => 'search'),
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
			'photos'      => array(self::HAS_MANY, 'Photo', 'vehicle_advertismentid'),
			'advertiser0' => array(self::BELONGS_TO, 'Party', 'advertiser'),
			'vehicle'     => array(self::BELONGS_TO, 'Vehicle', 'vehicleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicle_advertismentid' => 'Vehicle Advertisment ID',
			'vehicleid'              => 'Vehicle ID',
			'created_date'           => 'Created Date',
			'last_change'            => 'Last Change',
			'valid_to'               => 'Valid To',
			'active'                 => 'Active',
			'advertiser'             => 'Advertiser',
			'description'            => 'Description',
			'price'                  => 'Price',
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

		$criteria->with = array(
			'vehicle',
			'vehicle.cars'               => array('alias' => 'veh_car'),
			'vehicle.cars.carosseryType' => array('alias' => 'car_crs'),
			'vehicle.model'              => array('alias' => 'veh_mod'),
		);

		$criteria->order = 'price ' . $this->sort;

		$criteria->compare('vehicle.vehicle_typeId', $this->vehicleTypeId);
		$criteria->compare('vehicle.modelid', $this->modelId);
		$criteria->compare('veh_mod.makeid', $this->makeId);
		$criteria->compare('vehicle.fuel_typeid', $this->fuelTypeId);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleAdvertisment the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

}

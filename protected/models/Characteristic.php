<?php

/**
 * This is the model class for table "characteristic".
 *
 * The followings are the available columns in table 'characteristic':
 * @property integer $characteristicid
 * @property string $characteristic_name
 * @property integer $vehicle_typeid
 * @property integer $characteristic_typeid
 *
 * The followings are the available model relations:
 * @property Boat[] $boats
 * @property VehicleType $vehicleType
 * @property CharacteristicType $characteristicType
 * @property Vehicle[] $vehicles
 * @property Vehicle[] $vehicles1
 * @property Vehicle[] $vehicles2
 * @property Vehicle[] $vehicles3
 * @property Vehicle[] $vehicles4
 * @property Vehicle[] $vehicles5
 * @property Vehicle[] $vehicles6
 * @property VehicleCharacteristic[] $vehicleCharacteristics
 */
class Characteristic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'characteristic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_typeid, characteristic_typeid', 'numerical', 'integerOnly'=>true),
			array('characteristic_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('characteristicid, characteristic_name, vehicle_typeid, characteristic_typeid', 'safe', 'on'=>'search'),
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
			'boats' => array(self::HAS_MANY, 'Boat', 'body_material'),
			'vehicleType' => array(self::BELONGS_TO, 'VehicleType', 'vehicle_typeid'),
			'characteristicType' => array(self::BELONGS_TO, 'CharacteristicType', 'characteristic_typeid'),
			'vehicles' => array(self::HAS_MANY, 'Vehicle', 'color'),
			'vehicles1' => array(self::HAS_MANY, 'Vehicle', 'damages'),
			'vehicles2' => array(self::HAS_MANY, 'Vehicle', 'engine_emission_class'),
			'vehicles3' => array(self::HAS_MANY, 'Vehicle', 'gear_type'),
			'vehicles4' => array(self::HAS_MANY, 'Vehicle', 'transmission_type'),
			'vehicles5' => array(self::HAS_MANY, 'Vehicle', 'fuel_typeid'),
			'vehicles6' => array(self::HAS_MANY, 'Vehicle', 'vehicle_origin'),
			'vehicleCharacteristics' => array(self::HAS_MANY, 'VehicleCharacteristic', 'characteristicid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'characteristicid' => 'Characteristicid',
			'characteristic_name' => 'Characteristic Name',
			'vehicle_typeid' => 'Vehicle Typeid',
			'characteristic_typeid' => 'Characteristic Typeid',
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

		$criteria=new CDbCriteria;

		$criteria->compare('characteristicid',$this->characteristicid);
		$criteria->compare('characteristic_name',$this->characteristic_name,true);
		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);
		$criteria->compare('characteristic_typeid',$this->characteristic_typeid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Characteristic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static public function getCharacteristicForVehicleType($vehicleTypeId)
	{

	}

}

<?php

/**
 * This is the model class for table "vehicle_property".
 *
 * The followings are the available columns in table 'vehicle_property':
 * @property integer $vehicle_propertyid
 * @property string $vehicle_property_name
 * @property integer $vehicle_typeid
 * @property integer $property_typeid
 *
 * The followings are the available model relations:
 * @property Car[] $cars
 * @property Car[] $cars1
 * @property Car[] $cars2
 * @property Car[] $cars3
 * @property Car[] $cars4
 * @property Vehicle[] $vehicles
 * @property Vehicle[] $vehicles1
 * @property Vehicle[] $vehicles2
 * @property Vehicle[] $vehicles3
 * @property Vehicle[] $vehicles4
 * @property Vehicle[] $vehicles5
 * @property Vehicle[] $vehicles6
 * @property VehicleType $vehicleType
 */
class VehicleProperty extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_typeid, property_typeid', 'numerical', 'integerOnly'=>true),
			array('vehicle_property_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicle_propertyid, vehicle_property_name, vehicle_typeid, property_typeid', 'safe', 'on'=>'search'),
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
			'cars' => array(self::HAS_MANY, 'Car', 'carossery_type'),
			'cars1' => array(self::HAS_MANY, 'Car', 'enterier'),
			'cars2' => array(self::HAS_MANY, 'Car', 'enterier_color'),
			'cars3' => array(self::HAS_MANY, 'Car', 'no_of_doors'),
			'cars4' => array(self::HAS_MANY, 'Car', 'stearing_wheel_side'),
			'vehicles' => array(self::HAS_MANY, 'Vehicle', 'color'),
			'vehicles1' => array(self::HAS_MANY, 'Vehicle', 'damages'),
			'vehicles2' => array(self::HAS_MANY, 'Vehicle', 'engine_emission_class'),
			'vehicles3' => array(self::HAS_MANY, 'Vehicle', 'fuel_typeid'),
			'vehicles4' => array(self::HAS_MANY, 'Vehicle', 'gear_type'),
			'vehicles5' => array(self::HAS_MANY, 'Vehicle', 'transmission_type'),
			'vehicles6' => array(self::HAS_MANY, 'Vehicle', 'vehicle_origin'),
			'vehicleType' => array(self::BELONGS_TO, 'VehicleType', 'vehicle_typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicle_propertyid' => 'Vehicle Propertyid',
			'vehicle_property_name' => 'Vehicle Property Name',
			'vehicle_typeid' => 'Vehicle Typeid',
			'property_typeid' => 'Property Typeid',
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

		$criteria->compare('vehicle_propertyid',$this->vehicle_propertyid);
		$criteria->compare('vehicle_property_name',$this->vehicle_property_name,true);
		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);
		$criteria->compare('property_typeid',$this->property_typeid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleProperty the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

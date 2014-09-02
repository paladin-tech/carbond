<?php

/**
 * This is the model class for table "vehicle".
 *
 * The followings are the available columns in table 'vehicle':
 * @property integer $vehicleid
 * @property string $vin
 * @property string $engine_number
 * @property integer $vehicle_typeid
 * @property integer $modelid
 * @property integer $production_year
 * @property integer $first_registration
 * @property string $variant
 * @property integer $km
 * @property integer $engine_ccm
 * @property integer $engine_power
 * @property integer $fuel_typeid
 * @property integer $engine_emission_class
 * @property integer $gear_type
 * @property integer $transmission_type
 * @property integer $color
 * @property integer $registered
 * @property string $registration_valid_to
 * @property integer $vehicle_origin
 * @property integer $damages
 *
 * The followings are the available model relations:
 * @property Car[] $cars
 * @property VehicleProperty $color0
 * @property VehicleProperty $damages0
 * @property VehicleProperty $engineEmissionClass
 * @property VehicleProperty $fuelType
 * @property VehicleProperty $gearType
 * @property Model $model
 * @property VehicleProperty $transmissionType
 * @property VehicleProperty $vehicleOrigin
 * @property VehicleType $vehicleType
 * @property VehicleAdvertisment[] $vehicleAdvertisments
 */
class Vehicle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vin, modelid', 'required'),
			array('vehicle_typeid, modelid, production_year, first_registration, km, engine_ccm, engine_power, fuel_typeid, engine_emission_class, gear_type, transmission_type, color, registered, vehicle_origin, damages', 'numerical', 'integerOnly'=>true),
			array('vin, engine_number, variant', 'length', 'max'=>45),
			array('registration_valid_to', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicleid, vin, engine_number, vehicle_typeid, modelid, production_year, first_registration, variant, km, engine_ccm, engine_power, fuel_typeid, engine_emission_class, gear_type, transmission_type, color, registered, registration_valid_to, vehicle_origin, damages', 'safe', 'on'=>'search'),
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
			'cars' => array(self::HAS_MANY, 'Car', 'vehicleid'),
			'color0' => array(self::BELONGS_TO, 'VehicleProperty', 'color'),
			'damages0' => array(self::BELONGS_TO, 'VehicleProperty', 'damages'),
			'engineEmissionClass' => array(self::BELONGS_TO, 'VehicleProperty', 'engine_emission_class'),
			'fuelType' => array(self::BELONGS_TO, 'VehicleProperty', 'fuel_typeid'),
			'gearType' => array(self::BELONGS_TO, 'VehicleProperty', 'gear_type'),
			'model' => array(self::BELONGS_TO, 'Model', 'modelid'),
			'transmissionType' => array(self::BELONGS_TO, 'VehicleProperty', 'transmission_type'),
			'vehicleOrigin' => array(self::BELONGS_TO, 'VehicleProperty', 'vehicle_origin'),
			'vehicleType' => array(self::BELONGS_TO, 'VehicleType', 'vehicle_typeid'),
			'vehicleAdvertisments' => array(self::HAS_MANY, 'VehicleAdvertisment', 'vehicleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicleid' => 'Vehicleid',
			'vin' => 'Vin',
			'engine_number' => 'Engine Number',
			'vehicle_typeid' => 'Vehicle Typeid',
			'modelid' => 'Modelid',
			'production_year' => 'Production Year',
			'first_registration' => 'First Registration',
			'variant' => 'Variant',
			'km' => 'Km',
			'engine_ccm' => 'Engine Ccm',
			'engine_power' => 'Engine Power',
			'fuel_typeid' => 'Fuel Typeid',
			'engine_emission_class' => 'Engine Emission Class',
			'gear_type' => 'Gear Type',
			'transmission_type' => 'Transmission Type',
			'color' => 'Color',
			'registered' => 'Registered',
			'registration_valid_to' => 'Registration Valid To',
			'vehicle_origin' => 'Vehicle Origin',
			'damages' => 'Damages',
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

		$criteria->compare('vehicleid',$this->vehicleid);
		$criteria->compare('vin',$this->vin,true);
		$criteria->compare('engine_number',$this->engine_number,true);
		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);
		$criteria->compare('modelid',$this->modelid);
		$criteria->compare('production_year',$this->production_year);
		$criteria->compare('first_registration',$this->first_registration);
		$criteria->compare('variant',$this->variant,true);
		$criteria->compare('km',$this->km);
		$criteria->compare('engine_ccm',$this->engine_ccm);
		$criteria->compare('engine_power',$this->engine_power);
		$criteria->compare('fuel_typeid',$this->fuel_typeid);
		$criteria->compare('engine_emission_class',$this->engine_emission_class);
		$criteria->compare('gear_type',$this->gear_type);
		$criteria->compare('transmission_type',$this->transmission_type);
		$criteria->compare('color',$this->color);
		$criteria->compare('registered',$this->registered);
		$criteria->compare('registration_valid_to',$this->registration_valid_to,true);
		$criteria->compare('vehicle_origin',$this->vehicle_origin);
		$criteria->compare('damages',$this->damages);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehicle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

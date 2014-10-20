<?php

/**
 * This is the model class for table "car".
 *
 * The followings are the available columns in table 'car':
 * @property integer $carid
 * @property integer $vehicleid
 * @property integer $carossery_type
 * @property integer $no_of_doors
 * @property integer $no_of_seats
 * @property integer $stearing_wheel_side
 * @property integer $enterier
 * @property integer $enterier_color
 * @property integer $transmission_type
 * @property integer $climate_control
 *
 * The followings are the available model relations:
 * @property Characteristic $carosseryType
 * @property Characteristic $climateControl
 * @property Characteristic $enterier0
 * @property Characteristic $enterierColor
 * @property Characteristic $noOfDoors
 * @property Characteristic $stearingWheelSide
 * @property Characteristic $transmissionType
 * @property Vehicle $vehicle
 */
class Car extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'car';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transmission_type, climate_control', 'required'),
			array('vehicleid, carossery_type, no_of_doors, no_of_seats, stearing_wheel_side, enterier, enterier_color, transmission_type, climate_control', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('carid, vehicleid, carossery_type, no_of_doors, no_of_seats, stearing_wheel_side, enterier, enterier_color, transmission_type, climate_control', 'safe', 'on'=>'search'),
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
			'carosseryType' => array(self::BELONGS_TO, 'Characteristic', 'carossery_type'),
			'climateControl' => array(self::BELONGS_TO, 'Characteristic', 'climate_control'),
			'enterier0' => array(self::BELONGS_TO, 'Characteristic', 'enterier'),
			'enterierColor' => array(self::BELONGS_TO, 'Characteristic', 'enterier_color'),
			'noOfDoors' => array(self::BELONGS_TO, 'Characteristic', 'no_of_doors'),
			'stearingWheelSide' => array(self::BELONGS_TO, 'Characteristic', 'stearing_wheel_side'),
			'transmissionType' => array(self::BELONGS_TO, 'Characteristic', 'transmission_type'),
			'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'carid' => 'Car ID',
			'vehicleid' => 'Vehicle ID',
			'carossery_type' => 'Body Type',
			'no_of_doors' => 'No of Doors',
			'no_of_seats' => 'No of Seats',
			'stearing_wheel_side' => 'Steering Wheel Side',
			'enterier' => 'Interior',
			'enterier_color' => 'Interior Color',
			'transmission_type' => 'Transmission Type',
			'climate_control' => 'Climate Control',
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

		$criteria->compare('carid',$this->carid);
		$criteria->compare('vehicleid',$this->vehicleid);
		$criteria->compare('carossery_type',$this->carossery_type);
		$criteria->compare('no_of_doors',$this->no_of_doors);
		$criteria->compare('no_of_seats',$this->no_of_seats);
		$criteria->compare('stearing_wheel_side',$this->stearing_wheel_side);
		$criteria->compare('enterier',$this->enterier);
		$criteria->compare('enterier_color',$this->enterier_color);
		$criteria->compare('transmission_type',$this->transmission_type);
		$criteria->compare('climate_control',$this->climate_control);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Car the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

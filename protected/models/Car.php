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
 *
 * The followings are the available model relations:
 * @property VehicleProperty $carosseryType
 * @property VehicleProperty $enterier0
 * @property VehicleProperty $enterierColor
 * @property VehicleProperty $noOfDoors
 * @property VehicleProperty $stearingWheelSide
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
			array('carid, vehicleid', 'required'),
			array('carid, vehicleid, carossery_type, no_of_doors, no_of_seats, stearing_wheel_side, enterier, enterier_color', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('carid, vehicleid, carossery_type, no_of_doors, no_of_seats, stearing_wheel_side, enterier, enterier_color', 'safe', 'on'=>'search'),
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
			'carosseryType' => array(self::BELONGS_TO, 'VehicleProperty', 'carossery_type'),
			'enterier0' => array(self::BELONGS_TO, 'VehicleProperty', 'enterier'),
			'enterierColor' => array(self::BELONGS_TO, 'VehicleProperty', 'enterier_color'),
			'noOfDoors' => array(self::BELONGS_TO, 'VehicleProperty', 'no_of_doors'),
			'stearingWheelSide' => array(self::BELONGS_TO, 'VehicleProperty', 'stearing_wheel_side'),
			'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'carid' => 'Carid',
			'vehicleid' => 'Vehicleid',
			'carossery_type' => 'Carossery Type',
			'no_of_doors' => 'No Of Doors',
			'no_of_seats' => 'No Of Seats',
			'stearing_wheel_side' => 'Stearing Wheel Side',
			'enterier' => 'Enterier',
			'enterier_color' => 'Enterier Color',
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

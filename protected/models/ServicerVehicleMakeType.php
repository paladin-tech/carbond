<?php

/**
 * This is the model class for table "servicer_vehicle_make_type".
 *
 * The followings are the available columns in table 'servicer_vehicle_make_type':
 * @property integer $servicerid
 * @property integer $makeid
 * @property integer $vehicle_typeid
 * @property integer $official
 *
 * The followings are the available model relations:
 * @property VehicleMake $make
 * @property Company $servicer
 * @property VehicleType $vehicleType
 */
class ServicerVehicleMakeType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicer_vehicle_make_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('servicerid, makeid, vehicle_typeid', 'required'),
			array('servicerid, makeid, vehicle_typeid, official', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('servicerid, makeid, vehicle_typeid, official', 'safe', 'on'=>'search'),
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
			'make' => array(self::BELONGS_TO, 'VehicleMake', 'makeid'),
			'servicer' => array(self::BELONGS_TO, 'Company', 'servicerid'),
			'vehicleType' => array(self::BELONGS_TO, 'VehicleType', 'vehicle_typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'servicerid' => 'Servicerid',
			'makeid' => 'Makeid',
			'vehicle_typeid' => 'Vehicle Typeid',
			'official' => 'Official',
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

		$criteria->compare('servicerid',$this->servicerid);
		$criteria->compare('makeid',$this->makeid);
		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);
		$criteria->compare('official',$this->official);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServicerVehicleMakeType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

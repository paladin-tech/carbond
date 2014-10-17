<?php

/**
 * This is the model class for table "characteristic_type".
 *
 * The followings are the available columns in table 'characteristic_type':
 * @property integer $vehicle_characteristic_typeid
 * @property string $characteristic_type_name
 * @property integer $vehicle_typeid
 *
 * The followings are the available model relations:
 * @property Car[] $cars
 * @property Car[] $cars1
 * @property Car[] $cars2
 * @property Car[] $cars3
 * @property Car[] $cars4
 * @property Characteristic[] $characteristics
 * @property VehicleType $vehicleType
 */
class CharacteristicType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'characteristic_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('characteristic_type_name, vehicle_typeid', 'required'),
			array('vehicle_typeid', 'numerical', 'integerOnly'=>true),
			array('characteristic_type_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicle_characteristic_typeid, characteristic_type_name, vehicle_typeid', 'safe', 'on'=>'search'),
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
			'characteristics' => array(self::HAS_MANY, 'Characteristic', 'characteristic_typeid'),
			'vehicleType' => array(self::BELONGS_TO, 'VehicleType', 'vehicle_typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicle_characteristic_typeid' => 'Vehicle Characteristic Typeid',
			'characteristic_type_name' => 'Characteristic Type Name',
			'vehicle_typeid' => 'Vehicle Typeid',
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

		$criteria->compare('vehicle_characteristic_typeid',$this->vehicle_characteristic_typeid);
		$criteria->compare('characteristic_type_name',$this->characteristic_type_name,true);
		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CharacteristicType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

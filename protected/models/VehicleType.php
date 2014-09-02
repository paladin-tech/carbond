<?php

/**
 * This is the model class for table "vehicle_type".
 *
 * The followings are the available columns in table 'vehicle_type':
 * @property integer $vehicle_typeid
 * @property string $vehicle_type
 *
 * The followings are the available model relations:
 * @property Vehicle[] $vehicles
 * @property VehicleProperty[] $vehicleProperties
 */
class VehicleType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_type', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicle_typeid, vehicle_type', 'safe', 'on'=>'search'),
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
			'vehicles' => array(self::HAS_MANY, 'Vehicle', 'vehicle_typeid'),
			'vehicleProperties' => array(self::HAS_MANY, 'VehicleProperty', 'vehicle_typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicle_typeid' => 'Vehicle Typeid',
			'vehicle_type' => 'Vehicle Type',
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

		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);
		$criteria->compare('vehicle_type',$this->vehicle_type,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

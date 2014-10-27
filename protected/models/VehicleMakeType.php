<?php

/**
 * This is the model class for table "vehicle_make_type".
 *
 * The followings are the available columns in table 'vehicle_make_type':
 * @property integer $vehicle_makeid
 * @property integer $vehicle_typeid
 */
class VehicleMakeType extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_make_type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_makeid, vehicle_typeid', 'required'),
			array('vehicle_makeid, vehicle_typeid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehicle_makeid, vehicle_typeid', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicle_makeid' => 'Vehicle Makeid',
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

		$criteria->compare('vehicle_makeid',$this->vehicle_makeid);
		$criteria->compare('vehicle_typeid',$this->vehicle_typeid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleMakeType the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "trailer".
 *
 * The followings are the available columns in table 'trailer':
 * @property integer $trailerid
 * @property integer $vehicleid
 * @property string $height
 * @property integer $no_of_axis
 * @property string $max_load
 * @property string $max_weight
 *
 * The followings are the available model relations:
 * @property Vehicle $vehicle
 */
class Trailer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'trailer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicleid, no_of_axis', 'numerical', 'integerOnly'=>true),
			array('height, max_load, max_weight', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('trailerid, vehicleid, height, no_of_axis, max_load, max_weight', 'safe', 'on'=>'search'),
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
			'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'trailerid' => 'Trailerid',
			'vehicleid' => 'Vehicleid',
			'height' => 'Height',
			'no_of_axis' => 'No Of Axis',
			'max_load' => 'Max Load',
			'max_weight' => 'Max Weight',
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

		$criteria->compare('trailerid',$this->trailerid);
		$criteria->compare('vehicleid',$this->vehicleid);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('no_of_axis',$this->no_of_axis);
		$criteria->compare('max_load',$this->max_load,true);
		$criteria->compare('max_weight',$this->max_weight,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Trailer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

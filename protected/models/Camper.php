<?php

/**
 * This is the model class for table "camper".
 *
 * The followings are the available columns in table 'camper':
 * @property integer $camperid
 * @property integer $vehicleid
 * @property string $max_weight
 * @property integer $no_of_doors
 * @property integer $no_of_axis
 *
 * The followings are the available model relations:
 * @property Vehicle $vehicle
 */
class Camper extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'camper';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicleid, no_of_doors, no_of_axis', 'numerical', 'integerOnly' => true),
			array('max_weight', 'length', 'max' => 7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('camperid, vehicleid, max_weight, no_of_doors, no_of_axis', 'safe', 'on' => 'search'),
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
			'camperid'    => 'Camper ID',
			'vehicleid'   => 'Vehicle ID',
			'max_weight'  => 'Max Weight',
			'no_of_doors' => 'No. of Doors',
			'no_of_axis'  => 'No. of Axis',
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

		$criteria = new CDbCriteria;

		$criteria->compare('camperid', $this->camperid);
		$criteria->compare('vehicleid', $this->vehicleid);
		$criteria->compare('max_weight', $this->max_weight, true);
		$criteria->compare('no_of_doors', $this->no_of_doors);
		$criteria->compare('no_of_axis', $this->no_of_axis);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Camper the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

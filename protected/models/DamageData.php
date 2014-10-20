<?php

/**
 * This is the model class for table "damage_data".
 *
 * The followings are the available columns in table 'damage_data':
 * @property integer $damage_dataid
 * @property integer $vehicleid
 * @property integer $insuranceid
 * @property string $insurance_name
 * @property string $description
 * @property integer $data_provider
 * @property string $damage_date
 * @property integer $damage_type
 * @property integer $mileage
 *
 * The followings are the available model relations:
 * @property Party $dataProvider
 * @property DamageType $damageType
 * @property Company $insurance
 * @property Vehicle $vehicle
 */
class DamageData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'damage_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('data_provider, damage_date, damage_type, mileage', 'required'),
			array('vehicleid, insuranceid, data_provider, damage_type, mileage', 'numerical', 'integerOnly' => true),
			array('insurance_name', 'length', 'max' => 254),
			array('vehicleid, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('damage_dataid, vehicleid, insuranceid, insurance_name, description, data_provider, damage_date, damage_type, mileage', 'safe', 'on' => 'search'),
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
			'dataProvider' => array(self::BELONGS_TO, 'Party', 'data_provider'),
			'damageType'   => array(self::BELONGS_TO, 'DamageType', 'damage_type'),
			'insurance'    => array(self::BELONGS_TO, 'Company', 'insuranceid'),
			'vehicle'      => array(self::BELONGS_TO, 'Vehicle', 'vehicleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'damage_dataid'  => 'Damage Dataid',
			'vehicleid'      => 'Vehicleid',
			'insuranceid'    => 'Insuranceid',
			'insurance_name' => 'Insurance Name',
			'description'    => 'Description',
			'data_provider'  => 'Data Provider',
			'damage_date'    => 'Damage Date',
			'damage_type'    => 'Damage Type',
			'mileage'        => 'Mileage',
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

		$criteria->compare('damage_dataid', $this->damage_dataid);
		$criteria->compare('vehicleid', $this->vehicleid);
		$criteria->compare('insuranceid', $this->insuranceid);
		$criteria->compare('insurance_name', $this->insurance_name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('data_provider', $this->data_provider);
		$criteria->compare('damage_date', $this->damage_date, true);
		$criteria->compare('damage_type', $this->damage_type);
		$criteria->compare('mileage', $this->mileage);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DamageData the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

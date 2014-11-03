<?php

/**
 * This is the model class for table "service_advertisment".
 *
 * The followings are the available columns in table 'service_advertisment':
 * @property integer $service_advertismentid
 * @property string $created_date
 * @property string $last_change
 * @property string $valid_to
 * @property integer $active
 * @property string $service_description
 * @property integer $advertiser
 * @property integer $service_typeid
 * @property integer $promo
 * @property integer $discount
 *
 * The followings are the available model relations:
 * @property Party $advertiser0
 * @property ServiceType $serviceType
 */
class ServiceAdvertisment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'service_advertisment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('service_typeid', 'required'),
			array('active, advertiser, service_typeid, promo, discount', 'numerical', 'integerOnly'=>true),
			array('created_date, last_change, valid_to, service_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('service_advertismentid, created_date, last_change, valid_to, active, service_description, advertiser, service_typeid, promo, discount', 'safe', 'on'=>'search'),
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
			'advertiser0' => array(self::BELONGS_TO, 'Party', 'advertiser'),
			'serviceType' => array(self::BELONGS_TO, 'ServiceType', 'service_typeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'service_advertismentid' => 'Service Advertismentid',
			'created_date' => 'Created Date',
			'last_change' => 'Last Change',
			'valid_to' => 'Valid To',
			'active' => 'Active',
			'service_description' => 'Service Description',
			'advertiser' => 'Advertiser',
			'service_typeid' => 'Service Typeid',
			'promo' => 'Promo',
			'discount' => 'Discount',
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

		$criteria->compare('service_advertismentid',$this->service_advertismentid);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('last_change',$this->last_change,true);
		$criteria->compare('valid_to',$this->valid_to,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('service_description',$this->service_description,true);
		$criteria->compare('advertiser',$this->advertiser);
		$criteria->compare('service_typeid',$this->service_typeid);
		$criteria->compare('promo',$this->promo);
		$criteria->compare('discount',$this->discount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServiceAdvertisment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

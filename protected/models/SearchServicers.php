<?php

/**
 * This is the model class for table "search_servicers".
 *
 * The followings are the available columns in table 'search_servicers':
 * @property integer $partyid
 * @property string $company_name
 * @property string $address
 * @property string $phone_number
 * @property string $email
 * @property integer $makeid
 * @property integer $vehicle_typeid
 * @property integer $cityId
 * @property integer $countryId
 * @property string $city_Name
 * @property string $country_Name
 */
class SearchServicers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'search_servicers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partyid, makeid, vehicle_typeid, city_Name, country_Name', 'required'),
			array('partyid, makeid, vehicle_typeid, cityId, countryId', 'numerical', 'integerOnly' => true),
			array('company_name, city_Name', 'length', 'max' => 100),
			array('address', 'length', 'max' => 254),
			array('phone_number', 'length', 'max' => 45),
			array('email', 'length', 'max' => 320),
			array('country_Name', 'length', 'max' => 50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('partyid, company_name, address, phone_number, email, makeid, vehicle_typeid, cityId, countryId, city_Name, country_Name', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'partyid'        => 'Partyid',
			'company_name'   => 'Company Name',
			'address'        => 'Address',
			'phone_number'   => 'Phone Number',
			'email'          => 'Email',
			'makeid'         => 'Makeid',
			'vehicle_typeid' => 'Vehicle Typeid',
			'cityId'         => 'City',
			'countryId'      => 'Country',
			'city_Name'      => 'City Name',
			'country_Name'   => 'Country Name',
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

		$criteria->compare('makeid', $this->makeid);
		$criteria->compare('vehicle_typeid', $this->vehicle_typeid);
		if($this->cityId != '')
			$criteria->compare('cityId', $this->cityId);
		if($this->countryId != '')
			$criteria->compare('countryId', $this->countryId);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SearchServicers the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

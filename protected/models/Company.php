<?php

/**
 * This is the model class for table "company".
 *
 * The followings are the available columns in table 'company':
 * @property integer $partyid
 * @property string $company_name
 * @property string $address
 * @property string $cityid
 * @property string $tax_number
 * @property string $registration_number
 * @property string $contact_person
 * @property string $email
 * @property string $phone_number
 * @property string $web
 * @property string $mobile
 * @property string $longitude
 * @property string $latitude
 * @property string $company_description
 *
 * The followings are the available model relations:
 * @property City $city
 * @property Party $party
 * @property DamageData[] $damageDatas
 * @property ServicerVehicleMakeType[] $servicerVehicleMakeTypes
 * @property ServicingData[] $servicingDatas
 */
class Company extends CActiveRecord
{

	public $serviceTypeId;
	public $countryId;
	public $isTuning;
	public $roleId;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partyid, company_name, address, cityid, tax_number, registration_number, contact_person, email, phone_number', 'required'),
			array('partyid, cityid', 'numerical', 'integerOnly' => true),
			array('company_name, contact_person', 'length', 'max' => 100),
			array('address', 'length', 'max' => 254),
			array('tax_number, registration_number, phone_number, mobile', 'length', 'max' => 45),
			array('tax_number, registration_number', 'unique'),
			array('email, web', 'length', 'max' => 320),
			array('mobile, longitude, latitude', 'length', 'max' => 25),
			array('longitude, latitude, company_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('partyid, company_name, address, cityid, tax_number, registration_number, contact_person, email, phone_number', 'safe', 'on' => 'search'),
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
			'city'                     => array(self::BELONGS_TO, 'City', 'cityid'),
			'party'                    => array(self::BELONGS_TO, 'Party', 'partyid'),
			'damageDatas'              => array(self::HAS_MANY, 'DamageData', 'insuranceid'),
			'servicerVehicleMakeTypes' => array(self::HAS_MANY, 'ServicerVehicleMakeType', 'servicerid'),
			'servicingDatas'           => array(self::HAS_MANY, 'ServicingData', 'serviceid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'partyid'             => 'Party ID',
			'company_name'        => 'Company Name',
			'address'             => 'Address',
			'cityid'              => 'City',
			'tax_number'          => 'Tax Number',
			'registration_number' => 'Registration Number',
			'contact_person'      => 'Contact Person',
			'email'               => 'Email',
			'phone_number'        => 'Phone Number',
			'web'                 => 'Web',
			'mobile'              => 'Mobile',
			'longitude'           => 'Longitude',
			'latitude'            => 'Latitude',
			'company_description' => 'Company Description',
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

		$criteria->compare('partyid', $this->partyid);
		$criteria->compare('company_name', $this->company_name, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('cityid', $this->cityid);
		$criteria->compare('tax_number', $this->tax_number, true);
		$criteria->compare('registration_number', $this->registration_number, true);
		$criteria->compare('contact_person', $this->contact_person, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('phone_number', $this->phone_number, true);
		$criteria->compare('web', $this->web, true);
		$criteria->compare('mobile', $this->mobile, true);
		$criteria->compare('longitude', $this->longitude, true);
		$criteria->compare('latitude', $this->latitude, true);
		$criteria->compare('company_description', $this->company_description, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	public function searchSupportIndustry()
	{

		$criteria = new CDbCriteria;

		$criteria->with = array(
			'party',
			'party.serviceAdvertisments'             => array('alias' => 'p_seradv'),
			'party.serviceAdvertisments.serviceType' => array('alias' => 'seradv_sertyp'),
			'city.country'                           => array('alias' => 'c_cntr'),
		);

		$criteria->compare('seradv_sertyp.service_typeid', $this->serviceTypeId);
		$criteria->compare('cityid', $this->cityid);
		$criteria->compare('c_cntr.countryid', $this->countryId);
		$criteria->compare('seradv_sertyp.is_tuning', $this->isTuning);

		$criteria->together = true;

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

	public function searchFinancialCompanies()
	{

		$criteria = new CDbCriteria;

		$criteria->with = array(
			'party',
			'party.partyRoles' => array('alias' => 'p_parRol'),
			'city.country'     => array('alias' => 'c_cntr'),
		);

		$criteria->compare('p_parRol.roleid', $this->roleId);
		$criteria->compare('t.cityid', $this->cityid);
		$criteria->compare('c_cntr.countryid', $this->countryId);

		$criteria->together = true;

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Company the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "physical_person".
 *
 * The followings are the available columns in table 'physical_person':
 * @property integer $partyid
 * @property string $first_name
 * @property string $last_name
 * @property string $mobile
 * @property string $email
 * @property string $city
 * @property string $country
 * @property string $district
 * @property integer $zip_code
 *
 * The followings are the available model relations:
 * @property Party $party
 */
class PhysicalPerson extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'physical_person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partyid, country, district, zip_code', 'required'),
			array('partyid, zip_code', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, city', 'length', 'max'=>50),
			array('mobile', 'length', 'max'=>45),
			array('email', 'length', 'max'=>255),
			array('country, district', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('partyid, first_name, last_name, mobile, email, city, country, district, zip_code', 'safe', 'on'=>'search'),
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
			'party' => array(self::BELONGS_TO, 'Party', 'partyid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'partyid' => 'Partyid',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'mobile' => 'Mobile',
			'email' => 'Email',
			'city' => 'City',
			'country' => 'Country',
			'district' => 'District',
			'zip_code' => 'Zip Code',
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

		$criteria->compare('partyid',$this->partyid);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('district',$this->district,true);
		$criteria->compare('zip_code',$this->zip_code);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PhysicalPerson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

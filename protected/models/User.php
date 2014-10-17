<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $userid
 * @property string $username
 * @property integer $partyid
 * @property integer $active
 * @property string $password
 *
 * The followings are the available model relations:
 * @property Party $party
 */
class User extends CActiveRecord
{
	public $userType;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('username, password', 'required'),
			array('partyid, active', 'numerical', 'integerOnly' => true),
			array('username', 'length', 'max' => 45),
			array('password', 'length', 'max' => 255),
			array('username', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userid, username, partyid, active, password', 'safe', 'on' => 'search'),
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
			'userid'   => 'Userid',
			'username' => 'Username',
			'partyid'  => 'Party ID',
			'active'   => 'Active',
			'password' => 'Password',
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

		$criteria->compare('userid', $this->userid);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('partyid', $this->partyid);
		$criteria->compare('active', $this->active);
		$criteria->compare('password', $this->password, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}


	public function validatePassword($password)
	{
		return $this->hashPassword($password) === $this->password;
	}

	public function hashPassword($password)
	{
		return md5($password);
	}

}

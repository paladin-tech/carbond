<?php

/**
 * This is the model class for table "make_vin".
 *
 * The followings are the available columns in table 'make_vin':
 * @property integer $make_vinid
 * @property string $vin_pattern
 * @property integer $makeid
 *
 * The followings are the available model relations:
 * @property VehicleMake $make
 */
class MakeVin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'make_vin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vin_pattern, makeid', 'required'),
			array('makeid', 'numerical', 'integerOnly' => true),
			array('vin_pattern', 'length', 'max' => 3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('make_vinid, vin_pattern, makeid', 'safe', 'on' => 'search'),
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
			'make' => array(self::BELONGS_TO, 'VehicleMake', 'makeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'make_vinid'  => 'Make VIN ID',
			'vin_pattern' => 'VIN Pattern',
			'makeid'      => 'Make',
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

		$criteria->compare('make_vinid', $this->make_vinid);
		$criteria->compare('vin_pattern', $this->vin_pattern, true);
		$criteria->compare('makeid', $this->makeid);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MakeVin the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

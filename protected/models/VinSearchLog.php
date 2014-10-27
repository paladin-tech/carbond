<?php

/**
 * This is the model class for table "vin_search_log".
 *
 * The followings are the available columns in table 'vin_search_log':
 * @property integer $userid
 * @property string $search_date
 * @property string $vin
 * @property integer $success
 */
class VinSearchLog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vin_search_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, search_date, vin, success', 'required'),
			array('userid, success', 'numerical', 'integerOnly' => true),
			array('vin', 'length', 'max' => 50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userid, search_date, vin, success', 'safe', 'on' => 'search'),
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
			'userid'      => 'User',
			'search_date' => 'Search Date',
			'vin'         => 'VIN',
			'success'     => 'Success',
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
		$criteria->compare('search_date', $this->search_date, true);
		$criteria->compare('vin', $this->vin, true);
		$criteria->compare('success', $this->success);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VinSearchLog the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

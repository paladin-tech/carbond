<?php

/**
 * This is the model class for table "boat".
 *
 * The followings are the available columns in table 'boat':
 * @property integer $boatid
 * @property integer $vehicleid
 * @property integer $body_material
 * @property integer $number_of_engines
 * @property integer $length
 * @property integer $width
 * @property integer $height
 *
 * The followings are the available model relations:
 * @property Vehicle $vehicle
 * @property Characteristic $bodyMaterial
 */
class Boat extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'boat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicleid, body_material, number_of_engines, length, width, height', 'numerical', 'integerOnly' => true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('boatid, vehicleid, body_material, number_of_engines, length, width, height', 'safe', 'on' => 'search'),
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
			'vehicle'      => array(self::BELONGS_TO, 'Vehicle', 'vehicleid'),
			'bodyMaterial' => array(self::BELONGS_TO, 'Characteristic', 'body_material'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'boatid'            => 'Boat ID',
			'vehicleid'         => 'Vehicle ID',
			'body_material'     => 'Body Material',
			'number_of_engines' => 'Number of Engines',
			'length'            => 'Length',
			'width'             => 'Width',
			'height'            => 'Height',
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

		$criteria->compare('boatid', $this->boatid);
		$criteria->compare('vehicleid', $this->vehicleid);
		$criteria->compare('body_material', $this->body_material);
		$criteria->compare('number_of_engines', $this->number_of_engines);
		$criteria->compare('length', $this->length);
		$criteria->compare('width', $this->width);
		$criteria->compare('height', $this->height);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Boat the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

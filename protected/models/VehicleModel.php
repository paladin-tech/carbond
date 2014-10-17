<?php

/**
 * This is the model class for table "vehicle_model".
 *
 * The followings are the available columns in table 'vehicle_model':
 * @property integer $modelid
 * @property string $model_name
 * @property integer $makeid
 *
 * The followings are the available model relations:
 * @property Vehicle[] $vehicles
 * @property VehicleMake $make
 */
class VehicleModel extends CActiveRecord
{

	public $makeSearch;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehicle_model';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('model_name, makeid', 'required'),
			array('modelid, makeid', 'numerical', 'integerOnly' => true),
			array('model_name', 'length', 'max' => 45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('modelid, model_name, makeid', 'safe', 'on' => 'search'),
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
			'vehicles' => array(self::HAS_MANY, 'Vehicle', 'modelid'),
			'make'     => array(self::BELONGS_TO, 'VehicleMake', 'makeid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'modelid'    => 'Model ID',
			'model_name' => 'Model Name',
			'makeid'     => 'Make',
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

		$criteria->with = array('make');
		$criteria->compare('modelid', $this->modelid);
		$criteria->compare('model_name', $this->model_name, true);
		$criteria->compare('make.make_name', $this->makeSearch, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'sort'     => array(
				'attributes' => array(
					'makeSearch' => array(
						'asc'  => 'make.make_name',
						'desc' => 'make.make_name DESC',
					),
					'*',
				),
			),
		));
//		return new CActiveDataProvider($this, array(
//			'criteria' => $criteria,
//		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehicleModel the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

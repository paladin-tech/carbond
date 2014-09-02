<?php

/**
 * This is the model class for table "model".
 *
 * The followings are the available columns in table 'model':
 * @property integer $modelid
 * @property string $model_name
 * @property integer $makeid
 *
 * The followings are the available model relations:
 * @property Make $make
 * @property Vehicle[] $vehicles
 */
class Model extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'model';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modelid, makeid', 'required'),
			array('modelid, makeid', 'numerical', 'integerOnly'=>true),
			array('model_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('modelid, model_name, makeid', 'safe', 'on'=>'search'),
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
			'make' => array(self::BELONGS_TO, 'Make', 'makeid'),
			'vehicles' => array(self::HAS_MANY, 'Vehicle', 'modelid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'modelid' => 'Modelid',
			'model_name' => 'Model Name',
			'makeid' => 'Makeid',
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

		$criteria->compare('modelid',$this->modelid);
		$criteria->compare('model_name',$this->model_name,true);
		$criteria->compare('makeid',$this->makeid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Model the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "servicing_data".
 *
 * The followings are the available columns in table 'servicing_data':
 * @property integer $servicing_dataid
 * @property integer $vehicleid
 * @property integer $serviceid
 * @property string $service_name
 * @property string $description
 * @property integer $data_provider
 * @property string $servicing_date
 * @property integer $service_type
 * @property integer $mileage
 *
 * The followings are the available model relations:
 * @property Vehicle $vehicle
 * @property Party $dataProvider
 * @property Company $service
 * @property ServicingType $serviceType
 */
class ServicingData extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'servicing_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('vehicleid, serviceid, service_name, description, data_provider, servicing_date, service_type, mileage', 'required'),
			array('vehicleid, serviceid, data_provider, service_type, mileage', 'numerical', 'integerOnly' => true),
			array('service_name', 'length', 'max' => 254),
			array('description', 'safe'),
			array('servicing_date', 'date', 'format' => 'yyyy-mm-dd'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('servicing_dataid, vehicleid, serviceid, service_name, description, data_provider, servicing_date, service_type, mileage', 'safe', 'on' => 'search'),
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
			'dataProvider' => array(self::BELONGS_TO, 'Party', 'data_provider'),
			'service'      => array(self::BELONGS_TO, 'Company', 'serviceid'),
			'serviceType'  => array(self::BELONGS_TO, 'ServicingType', 'service_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'servicing_dataid' => 'Servicing Dataid',
			'vehicleid'        => 'Vehicleid',
			'serviceid'        => 'Serviceid',
			'service_name'     => 'Service Name',
			'description'      => 'Description',
			'data_provider'    => 'Data Provider',
			'servicing_date'   => 'Servicing Date',
			'service_type'     => 'Service Type',
			'mileage'          => 'Mileage',
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

		$criteria->compare('servicing_dataid', $this->servicing_dataid);
		$criteria->compare('vehicleid', $this->vehicleid);
		$criteria->compare('serviceid', $this->serviceid);
		$criteria->compare('service_name', $this->service_name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('data_provider', $this->data_provider);
		$criteria->compare('servicing_date', $this->servicing_date, true);
		$criteria->compare('service_type', $this->service_type);
		$criteria->compare('mileage', $this->mileage);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ServicingData the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

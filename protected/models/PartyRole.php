<?php

/**
 * This is the model class for table "party_role".
 *
 * The followings are the available columns in table 'party_role':
 * @property integer $party_roleid
 * @property integer $partyid
 * @property integer $roleid
 * @property integer $active
 * @property string $active_from
 * @property string $active_to
 *
 * The followings are the available model relations:
 * @property Role $role
 * @property Party $party
 */
class PartyRole extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'party_role';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partyid, roleid, active', 'numerical', 'integerOnly' => true),
			array('active_from, active_to', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('party_roleid, partyid, roleid, active, active_from, active_to', 'safe', 'on' => 'search'),
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
			'role'  => array(self::BELONGS_TO, 'Role', 'roleid'),
			'party' => array(self::BELONGS_TO, 'Party', 'partyid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'party_roleid' => 'Party Role ID',
			'partyid'      => 'Party',
			'roleid'       => 'Role',
			'active'       => 'Active',
			'active_from'  => 'Active From',
			'active_to'    => 'Active To',
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

		$criteria->compare('party_roleid', $this->party_roleid);
		$criteria->compare('partyid', $this->partyid);
		$criteria->compare('roleid', $this->roleid);
		$criteria->compare('active', $this->active);
		$criteria->compare('active_from', $this->active_from, true);
		$criteria->compare('active_to', $this->active_to, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PartyRole the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

<?php

/**
 * This is the model class for table "role_priviledge".
 *
 * The followings are the available columns in table 'role_priviledge':
 * @property integer $role_priviledgeid
 * @property integer $roleid
 * @property string $module_name
 * @property string $priviledge_name
 *
 * The followings are the available model relations:
 * @property Role $role
 */
class RolePriviledge extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'role_priviledge';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('roleid', 'numerical', 'integerOnly'=>true),
			array('module_name, priviledge_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('role_priviledgeid, roleid, module_name, priviledge_name', 'safe', 'on'=>'search'),
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
			'role' => array(self::BELONGS_TO, 'Role', 'roleid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'role_priviledgeid' => 'Role Priviledgeid',
			'roleid' => 'Roleid',
			'module_name' => 'Module Name',
			'priviledge_name' => 'Priviledge Name',
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

		$criteria->compare('role_priviledgeid',$this->role_priviledgeid);
		$criteria->compare('roleid',$this->roleid);
		$criteria->compare('module_name',$this->module_name,true);
		$criteria->compare('priviledge_name',$this->priviledge_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RolePriviledge the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

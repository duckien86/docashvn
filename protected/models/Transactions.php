<?php

/**
 * This is the model class for table "{{transactions}}".
 *
 * The followings are the available columns in table '{{transactions}}':
 * @property string $id
 * @property integer $user_id
 * @property string $customer
 * @property double $amount
 * @property string $note
 * @property integer $type
 * @property integer $group_id
 * @property string $create_date
 * @property string $ref_id
 * @property integer $status
 */
class Transactions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{transactions}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, amount, type, group_id', 'required'),
			array('user_id, type, group_id, status', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('id, ref_id', 'length', 'max'=>50),
			array('customer, note', 'length', 'max'=>255),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, customer, amount, note, type, group_id, create_date, ref_id, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'customer' => 'Customer',
			'amount' => 'Amount',
			'note' => 'Note',
			'type' => 'Type',
			'group_id' => 'Group',
			'create_date' => 'Create Date',
			'ref_id' => 'Ref',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('customer',$this->customer,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('ref_id',$this->ref_id,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Transactions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

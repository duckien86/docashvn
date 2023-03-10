<?php

/**
 * This is the model class for table "{{installment}}".
 *
 * The followings are the available columns in table '{{installment}}':
 * @property integer $id
 * @property string $shop_id
 * @property string $create_by
 * @property string $customer_name
 * @property string $phone_number
 * @property string $address
 * @property string $personal_id
 * @property double $total_money
 * @property double $receive_money
 * @property string $loan_date
 * @property integer $frequency
 * @property integer $is_before
 * @property string $start_date
 * @property string $create_date
 * @property string $note
 * @property string $manage_by
 * @property integer $status
 */
class Installment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{installment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shop_id, create_by, customer_name, total_money, receive_money, loan_date, frequency, create_date, manage_by', 'required'),
			array('frequency, is_before, status', 'numerical', 'integerOnly'=>true),
			array('total_money, receive_money', 'numerical'),
			array('shop_id, create_by, personal_id, manage_by', 'length', 'max'=>50),
			array('customer_name', 'length', 'max'=>255),
			array('phone_number', 'length', 'max'=>20),
			array('address, note', 'length', 'max'=>500),
			array('start_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shop_id, create_by, customer_name, phone_number, address, personal_id, total_money, receive_money, loan_date, frequency, is_before, start_date, create_date, note, manage_by, status', 'safe', 'on'=>'search'),
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
			'shop_id' => 'Shop',
			'create_by' => 'Create By',
			'customer_name' => 'Customer Name',
			'phone_number' => 'Phone Number',
			'address' => 'Address',
			'personal_id' => 'Personal',
			'total_money' => 'Total Money',
			'receive_money' => 'Receive Money',
			'loan_date' => 'Loan Date',
			'frequency' => 'Frequency',
			'is_before' => 'Is Before',
			'start_date' => 'Start Date',
			'create_date' => 'Create Date',
			'note' => 'Note',
			'manage_by' => 'Manage By',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('shop_id',$this->shop_id,true);
		$criteria->compare('create_by',$this->create_by,true);
		$criteria->compare('customer_name',$this->customer_name,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('personal_id',$this->personal_id,true);
		$criteria->compare('total_money',$this->total_money);
		$criteria->compare('receive_money',$this->receive_money);
		$criteria->compare('loan_date',$this->loan_date,true);
		$criteria->compare('frequency',$this->frequency);
		$criteria->compare('is_before',$this->is_before);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('manage_by',$this->manage_by,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Installment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

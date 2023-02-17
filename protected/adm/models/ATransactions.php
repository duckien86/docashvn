<?php

/**
 * This is the model class for table "{{transactions}}".
 *
 * The followings are the available columns in table '{{transactions}}':
 * @property integer $id
 * @property integer $create_by
 * @property string $shop_id
 * @property string $customer
 * @property double $amount
 * @property string $note
 * @property integer $type
 * @property integer $group_id
 * @property string $create_date
 * @property string $ref_id
 * @property integer $status
 * @property string $extra_param_1
 * @property string $extra_param_2
 * @property string $extra_param_3
 */
class ATransactions extends Transactions
{
	const  TYPE_INCOMING = 1; // thu tiền
	const  TYPE_OUTGOING = 2; // chi tiền

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('create_by, amount, type, group_id,create_date,shop_id', 'required'),
			array('create_by, type, status', 'numerical', 'integerOnly' => true),
			array('amount', 'numerical'),
			array('shop_id, ref_id, extra_param_1, extra_param_2, extra_param_3', 'length', 'max' => 50),
			array('customer, note', 'length', 'max' => 255),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, create_by, shop_id, customer, amount, note, type, group_id, create_date, ref_id, status, extra_param_1, extra_param_2, extra_param_3', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'create_by' => 'User',
			'shop_id' => 'Shop',
			'customer' => 'Customer',
			'amount' => 'Amount',
			'note' => 'Note',
			'type' => 'Type',
			'group_id' => 'Group',
			'create_date' => 'Create Date',
			'ref_id' => 'Ref',
			'status' => 'Status',
			'extra_param_1' => 'Extra Param 1',
			'extra_param_2' => 'Extra Param 2',
			'extra_param_3' => 'Extra Param 3',
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

		$criteria->compare('id', $this->id, true);
		$criteria->compare('create_by', $this->create_by);
		$criteria->compare('customer', $this->customer, true);
		$criteria->compare('amount', $this->amount);
		$criteria->compare('note', $this->note, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('group_id', $this->group_id);
		$criteria->compare('create_date', $this->create_date, true);
		$criteria->compare('ref_id', $this->ref_id, true);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ATransactions the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Xử lý giao dịch thu tiền
	 */
	public  function incomingPayment($create_by, $shop_id, $customer, $amount, $note,  $group_id, $ref_id)
	{
		$this->type = self::TYPE_INCOMING;
		$this->create_by = $create_by;
		$this->shop_id = $shop_id;
		$this->customer = $customer;
		$this->amount = abs($amount);
		$this->note = $note;
		$this->group_id = $group_id;
		$this->ref_id = $ref_id;
		$this->save();
	}

	/**
	 * Xử lý giao dịch chi tiền
	 */
	public function outgoingPayment($create_by, $shop_id, $customer, $amount, $note, $group_id, $ref_id)
	{
		$this->type = self::TYPE_OUTGOING;
		$this->create_by = $create_by;
		$this->create_date = date('Y-m-d H:i:s');
		$this->shop_id = $shop_id;
		$this->customer = $customer;
		$this->amount = -abs($amount);
		$this->note = $note;
		$this->group_id = $group_id;
		$this->ref_id = $ref_id;
		if (!$this->save()) {
			return false;
		}
		return true;
	}

	/**
	 * Trả về số tiền quỹ của 1 cửa hàng
	 */
	public static function getCurrentBalance($shop_id, $format = false)
	{
		$command = Yii::app()->db->createCommand();
		$balance = $command->select('sum(amount)')
			->from('tbl_transactions')
			->where('shop_id =:shop_id', [':shop_id' => $shop_id])
			->queryScalar();
		return ($format) ? Utils::numberFormat($balance) : $balance;
	}
}

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

	public $createByUserName;
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
	public static  function incomingPayment($create_by, $shop_id, $customer, $amount, $ref_id,  $group_id, $note)
	{
		if ($amount == 0) {
			Yii::log('Cannot do transaction with amount=' . $amount, CLogger::LEVEL_ERROR);
			return false;
		}

		$transaction = new self();
		$transaction->type = self::TYPE_INCOMING;
		$transaction->create_by = $create_by;
		$transaction->create_date = date('Y-m-d H:i:s');
		$transaction->shop_id = $shop_id;
		$transaction->customer = $customer;
		$transaction->amount = abs($amount);
		$transaction->note = $note;
		$transaction->group_id = $group_id;
		$transaction->ref_id = $ref_id;

		if ($transaction->save() == true) {
			return  $transaction;
		}
		return false;
	}

	/**
	 * Xử lý giao dịch chi tiền
	 */
	public static function outgoingPayment($create_by, $shop_id, $customer, $amount, $ref_id,  $group_id, $note)
	{
		if ($amount == 0) {
			Yii::log('Cannot do transaction with amount=' . $amount, CLogger::LEVEL_ERROR);
			return false;
		}

		$transaction = new self();
		$transaction->type = self::TYPE_OUTGOING;
		$transaction->create_by = $create_by;
		$transaction->create_date = date('Y-m-d H:i:s');
		$transaction->shop_id = $shop_id;
		$transaction->customer = $customer;
		$transaction->amount = -abs($amount);
		$transaction->note = $note;
		$transaction->group_id = $group_id;
		$transaction->ref_id = $ref_id;

		if ($transaction->save() == true) {
			return  $transaction;
		}
		return false;
	}

	/**
	 * Trả về số tiền quỹ hiện tại của 1 cửa hàng
	 */
	public static function sumCurrentBalance($shop_id, $format = false)
	{
		$command = Yii::app()->db->createCommand();
		$balance = $command->select('sum(amount)')
			->from('tbl_transactions')
			->where('shop_id =:shop_id', [':shop_id' => $shop_id])
			->queryScalar();
		return ($format) ? Utils::numberFormat($balance) : $balance;
	}

	/**
	 * Trả về số tiền giao dịch của cửa hàng theo mã chi tiêu (group_id)
	 * Được tính bằng số tiền bỏ ra
	 */
	public static function sumByGroup($shop_id, $group_id, $from_date = false, $to_date = false, $format = false)
	{
		$command = Yii::app()->db->createCommand();
		$command->select('sum(amount)')
			->from('tbl_transactions')
			->where("shop_id =:shop_id", [':shop_id' => $shop_id])
			->andWhere("group_id=:group_id", [':group_id' => $group_id]);
		if ($from_date && $to_date && $from_date < $to_date) {
			$command->andWhere("create_date > :from_date and create_date < :to_date", [':from_date' => $from_date, ':to_date' => $to_date]);
		}
		$balance = $command->queryScalar();
		return ($format) ? Utils::numberFormat($balance) : $balance;
	}

	/**
	 * Lấy dữ liệu giao dịch của hợp đồng
	 */
	public function loadHistory($installmentId)
	{
		$criteria = new CDbCriteria();
		$criteria->select = 't.*, t1.username as createByUserName';
		$criteria->join = 'LEFT JOIN tbl_users t1 ON t.create_by = t1.id';
		$criteria->compare('ref_id', $installmentId);
		$criteria->order = 'create_date asc';

		return $this->findAll($criteria);
	}

	public function calCreateDate($displayFormat = true)
	{
		return	$displayFormat ? Utils::convertDate('Y-m-d H:i:s', 'd/m/Y H:i:s', $this->create_date) : $this->create_date;
	}

	public function calAmount($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->amount) : $this->amount;
	}
}

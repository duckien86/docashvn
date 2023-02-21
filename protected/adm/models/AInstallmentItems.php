<?php

/**
 * This is the model class for table "{{installment_items}}".
 *
 * The followings are the available columns in table '{{installment_items}}':
 * @property integer $id
 * @property integer $installment_id
 * @property string $payment_date
 * @property double $amount
 * @property string $transaction_id
 */
class AInstallmentItems extends InstallmentItems
{
	// Tiền nộp trong giao dịch
	public $transAmount;
	// Ngày giao dịch
	public $transDate;
	// Ghi chú giao dịch
	public $transNote;


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, installment_id', 'numerical', 'integerOnly' => true),
			array('amount', 'numerical'),
			array('payment_date, transaction_id', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, installment_id, payment_date, amount, transaction_id', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'installment_id' => 'Installment',
			'payment_date' => 'Payment Date',
			'amount' => 'Amount',
			'transaction_id' => 'Transaction',
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

		$criteria->compare('id', $this->id);
		$criteria->compare('installment_id', $this->installment_id);
		$criteria->compare('payment_date', $this->payment_date, true);
		$criteria->compare('amount', $this->amount);
		$criteria->compare('transaction_id', $this->transaction_id, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Lấy dữ liệu kèm thông tin giao dịch
	 */
	public function loadTransaction($installmentId, $toDate = false)
	{
		$criteria = new CDbCriteria;
		$criteria->select = 't.*,t1.amount as transAmount, t1.create_date as transDate, t1.note as transNote';
		$criteria->join = 'LEFT JOIN tbl_transactions t1 ON t.transaction_id = t1.id ';
		$criteria->compare('installment_id', $installmentId, true);
		if ($toDate)
			$criteria->condition = "t.payment_date < '$toDate'";

		return $this->findAll($criteria);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AInstallmentItems the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function calPaymentDate($displayFormat = true)
	{
		return	$displayFormat ? Utils::convertDate('Y-m-d', 'd/m/Y', $this->payment_date) : $this->payment_date;
	}

	public function calTransDate($displayFormat = true)
	{
		$transDate = !empty($this->transDate) ? date('Y-m-d', strtotime($this->transDate)) : false;
		return	$displayFormat ? Utils::convertDate('Y-m-d', 'd/m/Y', $transDate) : $this->transDate;
	}

	public function calAmount($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->amount) : $this->amount;
	}

	public function calTransAmount($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->transAmount) : $this->transAmount;
	}

	/**
	 * Thực hiện giao dịch nộp tiền bát họ hoặc hủy nộp tiền
	 */
	public function doPayment($installment, $amountOther = false)
	{
		$transaction = new ATransactions;
		$createBy = $installment->create_by;
		$shopId = $installment->shop_id;
		$customerName = $installment->customer_name;
		$amount = $amountOther ? $amountOther : $this->amount;
		$ref_id = $installment->id;

		if (empty($this->transaction_id)) {
			$note = 'Nộp tiền bát họ';
			$groupId = 'installment_paid';

			if ($transaction->incomingPayment($createBy, $shopId, $customerName, $amount, $note, $groupId, $ref_id)) {
				$this->transaction_id = $transaction->id;
				return $this->save();
			}
		} else {
			$note = 'Hủy nộp tiền bát họ';
			$groupId = 'installment_paid_cancel';
			$transaction = ATransactions::model()->findByPk($this->transaction_id);
			if ($transaction) {
				if ($transaction->outgoingPayment($createBy, $shopId, $customerName, $amount, $note, $groupId, $ref_id)) {
					$this->transaction_id = '';
					return $this->save();
				}
			}
		}

		return false;
	}
}

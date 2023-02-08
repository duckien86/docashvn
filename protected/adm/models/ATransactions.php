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
class ATransactions extends Transactions
{
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, user_id, amount, type, group_id', 'required'),
			array('user_id, type, group_id, status', 'numerical', 'integerOnly' => true),
			array('amount', 'numerical'),
			array('id, ref_id', 'length', 'max' => 50),
			array('customer, note', 'length', 'max' => 255),
			array('create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, customer, amount, note, type, group_id, create_date, ref_id, status', 'safe', 'on' => 'search'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'Nhân viên',
			'customer' => 'Khách hàng',
			'amount' => 'Số tiền',
			'note' => 'Ghi chú',
			'type' => 'Loại',
			'group_id' => 'Lý do',
			'create_date' => 'Thời gian',
			'ref_id' => 'Tham chiếu',
			'status' => 'Trạng thái',
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
		$criteria->compare('user_id', $this->user_id);
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
}

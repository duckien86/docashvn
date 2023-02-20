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
class AInstallment extends Installment
{
	public $currentBalance;
	// public $endDate;

	public $items;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('shop_id, create_by, customer_name, total_money, receive_money, loan_date, frequency,start_date, create_date, manage_by', 'required'),
			array('frequency, is_before, status', 'numerical', 'integerOnly' => true),
			array('total_money, receive_money', 'numerical'),
			array('shop_id, create_by, personal_id, manage_by', 'length', 'max' => 50),
			array('customer_name', 'length', 'max' => 255),
			array('phone_number', 'length', 'max' => 20),
			array('address, note', 'length', 'max' => 500),
			array('currentBalance', 'checkEnough', 'message' => 'Tiền quỹ hiện tại không đủ.', 'on' => 'createNew'),
			array('total_money', 'compare', 'compareAttribute' => 'receive_money', 'operator' => '>='),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shop_id, create_by, customer_name, phone_number, address, personal_id, total_money, receive_money, loan_date, frequency, is_before, create_date, note, manage_by, status', 'safe', 'on' => 'search'),
		);
	}

	public function getDisplayEndDate()
	{
		$endDate = date('Y-m-d', strtotime($this->start_date) + $this->loan_date * 24 * 60 * 60);
		return	Utils::converstDate('Y-m-d', 'd/m/Y', $endDate);
	}

	public function getDisplayStartDate()
	{
		return	Utils::converstDate('Y-m-d', 'd/m/Y', $this->start_date);
	}

	public function beforeValidate()
	{
		if (parent::beforeValidate()) {
			$this->total_money = str_replace('.', '', $this->total_money);
			$this->receive_money = str_replace('.', '', $this->receive_money);
			$this->start_date =  Utils::converstDate('d/m/Y', 'Y-m-d', $this->start_date);

			return true;
		} else {
			return false;
		}
	}

	/**
	 * Validation có đủ tiền không?
	 */
	public function checkEnough($attribute, $params)
	{
		$this->currentBalance = ATransactions::getCurrentBalance($this->shop_id);

		if ($this->currentBalance < $this->receive_money) {
			$this->addError($attribute, $params['message'] . "(" . Utils::numberFormat($this->currentBalance) . " đ)");
		}
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
			'id' => 'Mã HĐ',
			'shop_id' => 'Shop',
			'create_by' => 'Nhân viên',
			'customer_name' => 'Tên khách hàng',
			'phone_number' => 'Điện thoại',
			'address' => 'Địa chỉ',
			'personal_id' => 'Số CMND/Hộ Chiếu',
			'total_money' => 'Bát họ',
			'receive_money' => 'Tiền đưa khách',
			'loan_date' => 'Bốc trong vòng',
			'frequency' => 'Số ngày đóng tiền',
			'is_before' => 'Thu họ trước',
			'start_date' => 'Ngày bốc',
			'create_date' => 'Ngày tạo',
			'note' => 'Ghi chú',
			'manage_by' => 'NV thu tiền',
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

		$criteria->compare('id', $this->id);
		if (!Yii::app()->user->super_admin) { // nếu không phải super_admin lấy nhân viên theo shop
			$criteria->compare('shop_id', Yii::app()->user->shop_id);
		} else {
			$criteria->compare('shop_id', $this->shop_id, true);
		}
		$criteria->order = 'create_date desc';

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
			'pagination' => array(
				'pageSize' => 20,
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AInstallment the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	public function genContractId()
	{
		$prefix = 'BH';
	}

	/**
	 * Tính chi tiết số tiền và ngày phải đóng tiền
	 */
	public function generateItems()
	{
		$dataItem = [
			'installment_id' => null,
			'payment_date' => null,
			'amount' => null,
		];

		// prepare data
		if ($this->loan_date > 0) {
			$amount = $this->total_money / $this->loan_date;
			for ($i = 0; $i < $this->loan_date; $i++) {
				$dataItem['installment_id'] = $this->id;
				$dataItem['payment_date'] = date('Y-m-d', strtotime($this->start_date) + $i * 24 * 60 * 60);
				$dataItem['amount'] = $amount;
				$dataInsert[] = $dataItem;
			}
		}

		$build = new CDbCommandBuilder(Yii::app()->db->schema);
		$command = $build->createMultipleInsertCommand('tbl_installment_items', $dataInsert);
		if ($command->execute()) {
			return true;
		}
		return false;
	}

	/**
	 * Tạo nút thao tác trên bảng admin
	 */
	public function generateColumnButton()
	{
		$installmentPayment = CHtml::link('<i class="glyphicon glyphicon-usd"></i>', '#', [
			'data-original-title' => "Nộp tiền",
			'data-toggle' => "modal",
			'data-target' => "#modal-installment-payment",
			'class' => 'btn btn-warning btn-xs',
			'onclick' => "initPaymentForm($this->id);"
		]);
		$closeContract = CHtml::link('<i class="glyphicon glyphicon-arrow-down"></i>', '#', [
			'data-original-title' => "Đóng hợp đồng",
			'data-toggle' => "tooltip",
			'class' => 'btn btn-danger btn-xs',
			'onclick' => "closeContract($this->id);"
		]);
		return $installmentPayment . $closeContract;
	}

	/**
	 * 
	 */
	public function createContract()
	{
		if ($this->save()) { // lưu hợp đồng
			if ($this->generateItems()) { // thêm chi tiết lịch đóng tiền
				// thực hiện thêm giao dịch chi tiền
				// ATransactions::outgoingPayment($this->create_by, $this->shop_id, $this->customer_name, $this->receive_money, 'Khách vay bát họ', 'inst_create', $this->id);
			}
		}
		$error = CHtml::errorSummary($this);
		return false;
	}


	public function cancel()
	{
		AInstallmentItems::model()->deleteAllByAttributes(['installment_id' => $this->id]);
		$this->delete();
	}

	/**
	 * Lấy dữ liệu về hợp đồng vay họ
	 */
	public function getData($installmentId, $shopId)
	{
		if (empty($installmentId) && empty($shopId)) return false;

		// Lấy dữ liệu hợp đồng
		$criteria = new CDbCriteria();
		$criteria->compare('id', $installmentId);
		$criteria->compare('shop_id', $shopId);
		$installment = AInstallment::model()->find($criteria);
		if ($installment) {
			$installmentItems = AInstallmentItems::model()->findAllByAttributes(['installment_id' => $installmentId]);
			$installment->items = $installmentItems;
		}

		return $installment;
	}
}

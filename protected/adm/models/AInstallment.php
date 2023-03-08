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
	// quỹ tiền mặt hiện tại
	public $currentBalance;
	// số tiền đóng dư hoặc nợ phát sinh trong các lần đóng tiền
	public $overBalance;
	// Tiền đã đóng
	public $paidAmount;
	// Tiền còn lại phải trả
	public $remainMoney;
	// Số kì đã đóng tiền
	public $paidPeriods;
	// Số kì chưa đóng tiền
	public $remainPeriods;
	// Số tiền đóng 1 ngày
	public $amountPerDay;
	// Có đang nợ tiền hay không
	public $inDebt = false;
	// Ngày đóng tiền kì tới
	public $nextPaidDate = false;

	/**
	 * chi tiết hợp đồng
	 * @return AInstallmentItems
	 */
	public $items;
	/**
	 * chi tiết giao dịch hợp đồng
	 * @return ATransactions
	 */
	public $transHistory;

	// Thuộc tính form search
	public $search_customer_name;
	public $search_loan_date;
	public $search_start_date;
	public $search_end_date;
	public $search_status;

	// Cấu hình nhóm giao dịch : Yii::app()->params['trans_group_id']
	const TRANS_GRP_CREATE = 'bh_create';
	const TRANS_GRP_PAID = 'bh_paid';
	const TRANS_GRP_EXTRA_PAID = 'bh_extra_paid';
	const TRANS_GRP_PAID_CANCEL = 'bh_paid_cancel';

	// Cấu hình trạng thái hợp đồng
	/**
	 * Trạng thái HĐ đã xóa
	 */
	const STATUS_DELETE = -1;
	/**
	 * Trạng thái hợp đồng đang vay
	 */
	const STATUS_OPEN = 1;
	/**
	 * Trạn thái HĐ nợ xấu
	 */
	const STATUS_BAD_DEBT = 2;
	/**
	 * Trạng thái HĐ hoàn thành
	 */
	const STATUS_FINISH = 10;

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
			array('customer_name', 'length', 'max' => 50),
			array('phone_number', 'length', 'max' => 20),
			array('address, note', 'length', 'max' => 500),
			array('currentBalance', 'checkEnough', 'message' => 'Tiền quỹ hiện tại không đủ.', 'on' => 'createNew'),
			array('total_money', 'compare', 'compareAttribute' => 'receive_money', 'operator' => '>='),
			array('total_money, receive_money,loan_date,frequency', 'compare', 'compareValue' => 0, 'operator' => '>'),
			array('frequency', 'compare', 'compareAttribute' => 'loan_date', 'operator' => '<'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, shop_id, create_by, customer_name, phone_number, address, personal_id, total_money, receive_money, loan_date, frequency, is_before, create_date, note, manage_by, status', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * Set default value by scenario
	 */
	public function setDefaultValue()
	{
		switch ($this->scenario) {
			case 'createNew': // set default value
				$this->loan_date = 50;
				$this->frequency = 1;
				$this->start_date = date('d/m/Y');
			default:
				return array();
		}
	}
	/**
	 * Tính toáng tất cả thông số liên quan đến 1 hợp đồng
	 * Tính toán số tiền đã trả
	 * Tính toán số tiền còn dư hoặc nợ của khách
	 * Tính toán số tiền còn lại phải trả
	 * Tính toán khoản tiền phải trả 1 ngày
	 * 
	 * @return void
	 */
	public function calculateAll()
	{
		$this->paidAmount = 0;
		$this->overBalance = 0;
		$this->paidPeriods = 0;
		$paymentByToday = 0; // số tiền phải trả tới hôm nay
		$lastTransaction = 0;
		if (empty($this->items)) {
			$installmentItems = new AInstallmentItems();
			$this->items = $installmentItems->loadTransaction($this->id);
		}
		for ($i = 0; $i < count($this->items); $i++) {
			$item = $this->items[$i];
			if (!empty($item->transaction_id)) {
				$this->paidAmount += $item->transAmount;
				$this->paidPeriods++;
				$lastTransaction = $i;
			}
			if (strtotime($item->payment_date) <= strtotime(date('Y/m/d'))) {
				$paymentByToday += $item->amount;
			}
		}

		// tính toán số tiền còn dư hoặc nợ của khách
		$this->overBalance = $this->paidAmount - $paymentByToday;
		// tính toán số tiền còn lại phải trả
		$this->remainMoney = $this->total_money - $this->paidAmount;
		// tính toán khoản tiền phải trả 1 ngày
		$this->amountPerDay = $this->total_money / $this->loan_date;
		// Tính toán xem có đang nợ họ không
		if ($this->overBalance < 0 && (abs($this->overBalance) / $this->amountPerDay >= 1)) {
			$this->inDebt = true;
		}
		// Tính toán ngày nộp tiền tiếp theo
		$nextTransaction = $lastTransaction > 0 ? $lastTransaction + 1 : $lastTransaction;
		$this->nextPaidDate = isset($this->items[$nextTransaction]) ? $this->items[$nextTransaction]->payment_date : '';
		// Tính toán số kì chưa nộp tiền
		$this->remainPeriods = count($this->items) - $this->paidPeriods;
	}

	/**
	 * Có đang trong tình trạng nợ hay không
	 * @return String
	 */
	public function calInDebt($displayFormat = true)
	{
		$output = '';
		if ($this->inDebt) {
			$output = CHtml::button('Nợ họ', ['class' => 'btn btn-danger btn-md']);
		} else {
			$output = 'Đang vay';
		}
		return	$output;
	}

	public function calStatus($displayFormat = true)
	{
		$output = '';
		switch ($this->status) {
			case self::STATUS_OPEN:
				if ($this->inDebt) {
					$output = CHtml::button('Nợ họ', ['class' => 'btn btn-danger btn-md']);
				} else {
					$output = 'Đang vay';
				}
				break;
			case self::STATUS_FINISH:
				$output = 'Hoàn thành';
				break;

			default:
				# code...
				break;
		}
		return	$output;
	}
	/**
	 * Số tiền đóng dư hoặc nợ phát sinh trong các lần đóng tiền
	 * @return string,float 
	 */
	public function calAmountPerDay($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->amountPerDay) : $this->amountPerDay;
	}

	/**
	 * Số tiền đóng dư hoặc nợ phát sinh trong các lần đóng tiền
	 * @return string,float 
	 */
	public function calOverBalance($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->overBalance) : $this->overBalance;
	}


	/**
	 * Tính toán số tiền còn lại cần trả
	 * @return string,float
	 */
	public function calRemainMoney($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->remainMoney) : $this->remainMoney;
	}

	/**
	 * Tính toán số tiền đã trả
	 * 
	 * @return string,float 
	 */
	public function calPaidAmount($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->paidAmount) : $this->paidAmount;
	}

	/**
	 * Tính toán tỉ lể ăn lãi
	 * @return string
	 */
	public function calInterestRate()
	{
		$interestRate = round($this->receive_money / $this->total_money * 10, 2);
		return	"10 ăn <b>$interestRate</b>";
	}

	/**
	 * Tính toán lãi phí
	 * @return string,float 
	 */
	public function calInterestFee($displayFormat = true)
	{
		$value = $this->total_money - $this->receive_money;
		return	$displayFormat ? Utils::numberFormat($value) : $value;
	}

	/**
	 * Transform to display string
	 * @return string,float 
	 */
	public function calTotalMoney($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->total_money) : $this->total_money;
	}
	/**
	 * Transform to display string
	 * @return string,float 
	 */
	public function calReceiveMoney($displayFormat = true)
	{
		return	$displayFormat ? Utils::numberFormat($this->receive_money) : $this->receive_money;
	}
	/**
	 * Transform to display string
	 * @return string
	 */
	public function calEndDate($displayFormat = true, $fromFormat = 'Y-m-d', $toFormat = 'd/m/Y')
	{
		$endDate = date($fromFormat, strtotime($this->start_date) + $this->loan_date * 24 * 60 * 60);
		return	$displayFormat ? Utils::convertDate($fromFormat, $toFormat, $endDate) : $endDate;
	}

	/**
	 * Transform to display string
	 * @return string
	 */
	public function calNextPaidDate($displayFormat = true, $fromFormat = 'Y-m-d', $toFormat = 'd/m/Y')
	{
		$output = '';
		if ($this->nextPaidDate == date('Y-m-d')) {
			$output = CHtml::button('Hôm nay', ['class' => 'btn btn-warning btn-md']);
		} else if ($this->nextPaidDate == date('Y-m-d', time() + 24 * 60 * 60)) {
			$output = CHtml::button('Ngày mai', ['class' => 'btn btn-info btn-md']);
		} else {
			$output = $displayFormat ? Utils::convertDate($fromFormat, $toFormat, $this->nextPaidDate) : $this->nextPaidDate;
		}
		return	$output;
	}
	/**
	 * Transform to display string
	 * @return string
	 */
	public function calStartDate($displayFormat = true, $fromFormat = 'Y-m-d', $toFormat = 'd/m/Y')
	{
		return	$displayFormat ? Utils::convertDate($fromFormat, $toFormat, $this->start_date) : $this->start_date;
	}


	public function beforeValidate()
	{
		if (parent::beforeValidate()) {
			switch ($this->scenario) {
				case 'createNew':
					$this->total_money = str_replace('.', '', $this->total_money);
					$this->receive_money = str_replace('.', '', $this->receive_money);
					$this->start_date =  Utils::convertDate('d/m/Y', 'Y-m-d', $this->start_date);
					break;

				default:
					# code...
					break;
			}
			return true;
		} else {
			return false;
		}
	}

	public function afterConstruct()
	{
		parent::afterConstruct();
		$this->setDefaultValue();
		// your code here
	}

	/**
	 * Validation có đủ tiền không?
	 */
	public function checkEnough($attribute, $params)
	{
		$this->currentBalance = ATransactions::sumCurrentBalance($this->shop_id);

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
			'search_customer_name' => 'Tên khách hàng',
			'search_loan_date' => 'Thời gian vay',
			'search_start_date' => 'Từ ngày',
			'search_end_date' => 'Đến ngày',
			'search_status' => 'Trạng thái',

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
				'pageSize' => 50,
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

	// public function genContractId()
	// {
	// 	$prefix = 'BH';
	// }

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
			// Tính số kì phải trả (làm tròn xuống)
			$numberOfPeriods = floor($this->loan_date / $this->frequency);
			// Tính số tiền 1 kỳ phải trả
			$amount = floor($this->total_money / $this->loan_date * $this->frequency);

			for ($i = 0; $i < $numberOfPeriods; $i++) {
				$dataItem['installment_id'] = $this->id;
				$dataItem['payment_date'] = date('Y-m-d', strtotime($this->start_date) + $i * $this->frequency * 24 * 60 * 60);
				$dataItem['amount'] = $amount;
				$dataInsert[] = $dataItem;
			}
			// Tính số tiền thừa phải trả ở kỳ cuối nếu có
			if ($this->total_money - $amount * $numberOfPeriods > 0) {
				$dataItem['installment_id'] = $this->id;
				$dataItem['payment_date'] = date('Y-m-d', strtotime($this->start_date) + $this->loan_date * 24 * 60 * 60);
				$dataItem['amount'] = $this->total_money - $amount * $numberOfPeriods;
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
		$htmlOuput = '';
		if ($this->status == self::STATUS_FINISH) {
			$reOpenContract = CHtml::link('<i class="glyphicon glyphicon-share"></i>', '#', [
				'data-original-title' => "Mở lại hợp đồng",
				'data-toggle' => "Mở lại hợp đồng",
				// 'data-toggle' => "modal",
				// 'data-target' => "#modal-installment-payment",
				'class' => 'btn btn-danger btn-xs',
				'onclick' => "reopen_contract($this->id);"
			]);
			$htmlOuput = $reOpenContract;
		} else {
			$installmentPayment = CHtml::link('<i class="glyphicon glyphicon-usd"></i>', '#', [
				'data-original-title' => "Nộp tiền",
				'data-toggle' => "modal",
				'data-target' => "#modal-installment-payment",
				'class' => 'btn btn-warning btn-xs',
				'onclick' => "initPaymentForm($this->id);"
			]);
			$closeContract = CHtml::link('<i class="glyphicon glyphicon-check"></i>', '#', [
				'data-original-title' => "Đóng hợp đồng",
				'data-toggle' => "modal",
				'data-target' => "#modal-installment-payment",
				'class' => 'btn btn-info btn-xs',
				'onclick' => "initPaymentForm($this->id); setTimeout(function(){ $('#tab-close-contract').click(); },100);"
			]);
			$htmlOuput = $installmentPayment . $closeContract;
		}
		return $htmlOuput;
	}

	/**
	 * Tạo hợp đồng bát họ
	 */
	public function createContract($inputData, &$errors)
	{
		$this->attributes = $inputData;
		if (!Yii::app()->user->super_admin) { // set mã cửa hàng theo user đăng nhập
			$this->shop_id = Yii::app()->user->shop_id;
		}
		$this->create_date = date('Y-m-d H:i:s');
		$this->create_by = Yii::app()->user->id;
		$this->status = self::STATUS_OPEN;
		if ($this->save()) {
			if ($this->generateItems()) {
				// thực hiện thêm giao dịch chi tiền
				$transaction = new ATransactions;
				$createBy = $this->create_by;
				$shopId = $this->shop_id;
				$customerName = $this->customer_name;
				$amount = $this->receive_money;
				$ref_id = $this->id;
				$transGroupId = self::TRANS_GRP_CREATE;
				$note = Yii::app()->params['trans_group_id'][self::TRANS_GRP_CREATE];

				if (!$transaction->outgoingPayment($createBy, $shopId, $customerName, $amount, $note, $transGroupId, $ref_id)) {
					$errors = CHtml::errorSummary($transaction);
					$this->clearAllData();
					return false;
				}
			} else { // Có lỗi trong quá trình 
				$errors = 'Không thể tạo lịch đóng tiền';
				return false;
			}
		} else {
			$errors = CHtml::errorSummary($this);
			return false;
		}
		return true;
	}


	/**
	 * Thực hiện tất toán các ngày nộp tiền mà chưa có giao dịch
	 *
	 * @param  mixed $extraMoney - Tiền điều chỉnh khi thực hiện tất toán hợp đồng
	 * @return int - số lượng bản ghi đã thực hiện
	 */
	public function closeContract($extraMoney = 0)
	{
		$transaction = Yii::app()->db->beginTransaction();

		try {
			// Thực hiện đóng tiền các ngày mà chưa thanh toán.
			$totalItems = count($this->items);
			$countAffectedItems = 0;
			for ($i = 0; $i < $totalItems; $i++) {
				$item = $this->items[$i];
				if (empty($item->trans_id)) {
					if ($item->addPayment($this)) $countAffectedItems++;
				}
			}
			if ($extraMoney != 0) { // nếu có tiền điều chỉnh tăng hoặc giảm
				$this->extraPaid($extraMoney);
			}

			// Cập nhật trạng thái hợp đồng
			$this->status = AInstallment::STATUS_FINISH;
			$this->save();

			// Commit the transaction if all operations succeed
			$transaction->commit();
			return true;
		} catch (CException $e) {
			// Roll back the transaction if an error occurs
			$transaction->rollback();
			Yii::log($e->getMessage(), CLogger::LEVEL_ERROR);
		}
		return false;
	}

	/**
	 * Thực hiện giao dịch đóng tiền hoặc hủy đóng tiền
	 * nộp tiền bát họ || hủy nộp tiền
	 * @return int - số lượng bản ghi đã thực hiện
	 */
	public function doPayment($amountOther = false)
	{
		$totalItems = count($this->items);
		$countItems = 0;
		if (empty($this->transaction_id)) { // Muốn thực hiện nộp tiền
			for ($i = 0; $i < $totalItems; $i++) {
				$item = $this->items[$i];

				if ($item->addPayment($this)) $countItems++;

				if ($this->id == $item->id)
					return $countItems;
			}
		} else { // Muốn hủy giao dịch
			for (
				$i = $totalItems - 1;
				$i >= 0;
				$i--
			) {
				$item = $this->items[$i];
				if ($item->cancelPayment($this)) $countItems++;
				if ($this->id == $item->id)
					return $countItems;
			}
		}
	}

	/**
	 * Thực hiện giao dịch nộp tiền bổ sung
	 *
	 * @param  mixed $installment
	 * @param  mixed $transNote
	 * @param  mixed $amountOther
	 * @return boolean
	 */
	public function extraPaid($amountOther = 0, $transNote = '')
	{
		if ($amountOther == 0) return true;

		$transaction = new ATransactions;
		$createBy = $this->create_by;
		$shopId = $this->shop_id;
		$customerName = $this->customer_name;
		$amount = $amountOther;
		$refId = $this->id;

		$transGroupId = AInstallment::TRANS_GRP_EXTRA_PAID;
		$transNote = empty($transNote) ? Yii::app()->params['trans_group_id'][$transGroupId] : $transNote;
		if ($amount > 0) {
			if ($transaction->incomingPayment($createBy, $shopId, $customerName, $amount, $transNote, $transGroupId, $refId)) {
				return true;
			}
		} else {
			if ($transaction->outgoingPayment($createBy, $shopId, $customerName, $amount, $transNote, $transGroupId, $refId)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Xóa bỏ hợp đồng và dữ liệu liên quan
	 */
	protected function clearAllData()
	{
		AInstallmentItems::model()->deleteAllByAttributes(['installment_id' => $this->id]);
		$this->delete();
	}

	/**
	 * Lấy dữ liệu về hợp đồng vay họ
	 * @param $details boolean : Xác định xem có cần lấy details không
	 * @param $calculateAll boolean : Có muốn cần tính toán các tham số không
	 * @return AInstallment
	 */
	public static function loadContract($installmentId, $shopId, $details = true, $calculateAll = true)
	{
		if (empty($installmentId) && empty($shopId)) return false;

		// Lấy dữ liệu hợp đồng
		$criteria = new CDbCriteria();
		$criteria->compare('id', $installmentId);
		$criteria->compare('shop_id', $shopId);
		$installment = AInstallment::model()->find($criteria);
		if ($installment) {
			$installment->loadContractDetails();
			$installment->loadTransHistory();
			if ($calculateAll)
				$installment->calculateAll();
			return $installment;
		}
		return false;
	}

	/**
	 * Lấy dữ liệu chi tiết của hợp đồng vay
	 */
	public function loadContractDetails()
	{
		$installmentItems = new AInstallmentItems();
		$this->items = $installmentItems->loadTransaction($this->id);
	}
	/**
	 * Lấy dữ liệu lịch sử giao dịch của hợp đồng vay
	 */
	public function loadTransHistory()
	{
		$trans = new ATransactions();
		$this->transHistory = $trans->loadHistory($this->id);
	}

	/**
	 * Tổng số tiền đã cho vay chưa bao gồm tiền thu về
	 */
	public static function loadTotalLendingGross($shop_id, $from_date = false, $to_date = false, $format = false)
	{
		// $balance = abs(ATransactions::sumByGroup($shop_id, AInstallment::TRANS_GRP_CREATE));
		// return ($format) ? Utils::numberFormat($balance) : $balance;
		$command = Yii::app()->db->createCommand();
		$command->select('SUM(total_money)')
			->from('tbl_installment')
			->where("shop_id =:shop_id", [':shop_id' => $shop_id])
			->andWhere("status <>:status", [':status' => AInstallment::STATUS_FINISH]);
		if ($from_date && $to_date && $from_date < $to_date) {
			$command->andWhere(
				"create_date > :from_date AND create_date < :to_date",
				[
					':from_date' => $from_date,
					':to_date' => $to_date
				]
			);
		}

		$total = $command->queryScalar();
		return ($format) ? Utils::numberFormat($total) : $total;
	}

	/**
	 * Tính lãi phí dự kiến 
	 */
	public static function loadExpectedInterest($shop_id, $format = false)
	{
		$command = Yii::app()->db->createCommand();
		$total = $command->select('sum(total_money - receive_money)')
			->from('tbl_installment')
			->where("shop_id =:shop_id", [':shop_id' => $shop_id])
			->andWhere("status <>:status", [':status' => AInstallment::STATUS_FINISH])
			->queryScalar();
		return ($format) ? Utils::numberFormat($total) : $total;
	}

	/**
	 * Tính lãi phí đã thu
	 */
	public static function loadPaidInterest($shop_id, $format = false)
	{
		$command = Yii::app()->db->createCommand();
		$total = $command->select('sum(t1.amount)')
			->from('tbl_installment_items t')
			->join('tbl_transactions t1', 't1.id = t.transaction_id')
			->join('tbl_installment t3', 't3.id = t.installment_id')
			->where("t3.shop_id =:shop_id", [':shop_id' => $shop_id])
			->andWhere("t3.status =:status", [':status' => AInstallment::STATUS_OPEN])
			->andWhere("t.payment_date <= :payment_date", [':payment_date' => date('Y/m/d')])
			->queryScalar();

		return ($format) ? Utils::numberFormat($total) : $total;
	}

	/**
	 * Tính nợ còn phải thu (bảo gồm tiền chưa nộp hoặc nộp thiếu)
	 */
	public static function loadDebt($shop_id, $format = false)
	{
		$command = Yii::app()->db->createCommand();
		$total = $command->select('sum(t.amount) - sum(COALESCE(t1.amount,0))')
			->from('tbl_installment_items t')
			->leftJoin('tbl_transactions t1', 't1.id = t.transaction_id')
			->join('tbl_installment t3', 't3.id = t.installment_id')
			->where("t3.shop_id =:shop_id", [':shop_id' => $shop_id])
			->andWhere("t3.status =:status", [':status' => AInstallment::STATUS_OPEN])
			->andWhere("t.payment_date < :payment_date", [':payment_date' => date('Y/m/d')])
			// ->getText();
			->queryScalar();

		return ($format) ? Utils::numberFormat($total) : $total;
	}
}

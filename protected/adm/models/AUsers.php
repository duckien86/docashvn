<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property integer $createtime
 * @property integer $lastvisit
 * @property integer $superuser
 * @property integer $status
 * @property integer $parent_id
 * @property string $shop_id
 */
class AUsers extends Users
{
	const  ACTIVE = 1;
	const  NOT_ACTIVE = 0;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, email', 'required'),
			array('createtime, lastvisit, superuser, status, parent_id', 'numerical', 'integerOnly' => true),
			array('username', 'length', 'max' => 20),
			array('password, email, activkey', 'length', 'max' => 128),
			array('shop_id', 'length', 'max' => 50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, activkey, createtime, lastvisit, superuser, status, parent_id, shop_id', 'safe', 'on' => 'search'),
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
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'activkey' => 'Activkey',
			'createtime' => 'Createtime',
			'lastvisit' => 'Lastvisit',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'parent_id' => 'Parent',
			'shop_id' => 'Shop',
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
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('activkey', $this->activkey, true);
		$criteria->compare('createtime', $this->createtime);
		$criteria->compare('lastvisit', $this->lastvisit);
		$criteria->compare('superuser', $this->superuser);
		$criteria->compare('status', $this->status);
		$criteria->compare('parent_id', $this->parent_id);
		$criteria->compare('shop_id', $this->shop_id, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AUsers the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Trả về danh sách cửa hàng hiện có
	 */
	public static function list2Arr()
	{
		$criteria = new CDbCriteria();
		if (!Yii::app()->user->super_admin) { // nếu không phải super_admin lấy nhân viên theo shop
			$criteria->compare('shop_id', Yii::app()->user->shop_id);
		}
		$criteria->compare('status', self::ACTIVE);

		$models = self::model()->findAll($criteria);

		if (empty($models)) return [];

		return CHtml::listData($models, 'id', 'username');
	}
}

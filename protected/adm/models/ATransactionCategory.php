<?php

/**
 * This is the model class for table "{{transaction_category}}".
 *
 * The followings are the available columns in table '{{transaction_category}}':
 * @property integer $id
 * @property string $name
 * @property integer $in_out
 * @property integer $sort_index
 * @property integer $status
 */
class ATransactionCategory extends TransactionCategory
{
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên',
			'in_out' => 'In Out',
			'sort_index' => 'Sort Index',
			'status' => 'Status',
			'code' => 'Code',
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
		$criteria->compare('name', $this->name, true);
		$criteria->compare('in_out', $this->in_out);
		$criteria->compare('sort_index', $this->sort_index);
		$criteria->compare('status', $this->status);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ATransactionCategory the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}

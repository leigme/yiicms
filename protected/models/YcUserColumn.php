<?php

/**
 * This is the model class for table "yc_user_column".
 *
 * The followings are the available columns in table 'yc_user_column':
 * @property integer $UserId
 * @property integer $ColumnId
 * @property string $Remark
 * @property integer $OperateFlag
 * @property integer $DeleteFlag
 * @property string $CreateTime
 * @property string $UpdateTime
 * @property string $DeleteTime
 *
 * The followings are the available model relations:
 * @property YcUser $user
 * @property YcColumn $column
 */
class YcUserColumn extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return YcUserColumn the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yc_user_column';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserId, ColumnId, OperateFlag, DeleteFlag', 'numerical', 'integerOnly'=>true),
			array('Remark, CreateTime, UpdateTime, DeleteTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('UserId, ColumnId, Remark, OperateFlag, DeleteFlag, CreateTime, UpdateTime, DeleteTime', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'YcUser', 'UserId'),
			'column' => array(self::BELONGS_TO, 'YcColumn', 'ColumnId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserId' => 'User',
			'ColumnId' => 'Column',
			'Remark' => 'Remark',
			'OperateFlag' => 'Operate Flag',
			'DeleteFlag' => 'Delete Flag',
			'CreateTime' => 'Create Time',
			'UpdateTime' => 'Update Time',
			'DeleteTime' => 'Delete Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('UserId',$this->UserId);
		$criteria->compare('ColumnId',$this->ColumnId);
		$criteria->compare('Remark',$this->Remark,true);
		$criteria->compare('OperateFlag',$this->OperateFlag);
		$criteria->compare('DeleteFlag',$this->DeleteFlag);
		$criteria->compare('CreateTime',$this->CreateTime,true);
		$criteria->compare('UpdateTime',$this->UpdateTime,true);
		$criteria->compare('DeleteTime',$this->DeleteTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
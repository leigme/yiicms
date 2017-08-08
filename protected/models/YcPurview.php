<?php

/**
 * This is the model class for table "yc_purview".
 *
 * The followings are the available columns in table 'yc_purview':
 * @property integer $PurviewId
 * @property integer $GroupId
 * @property string $Title
 * @property string $Remark
 * @property integer $OperateFlag
 * @property integer $DeleteFlag
 * @property string $CreateTime
 * @property string $UpdateTime
 * @property string $DeleteTIme
 *
 * The followings are the available model relations:
 * @property YcPurviewGroup $group
 * @property YcUserPurview[] $ycUserPurviews
 */
class YcPurview extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return YcPurview the static model class
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
		return 'yc_purview';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GroupId, OperateFlag, DeleteFlag', 'numerical', 'integerOnly'=>true),
			array('Title, Remark, CreateTime, UpdateTime, DeleteTIme', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PurviewId, GroupId, Title, Remark, OperateFlag, DeleteFlag, CreateTime, UpdateTime, DeleteTIme', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'YcPurviewGroup', 'GroupId'),
			'ycUserPurviews' => array(self::HAS_MANY, 'YcUserPurview', 'PurviewId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PurviewId' => 'Purview',
			'GroupId' => 'Group',
			'Title' => 'Title',
			'Remark' => 'Remark',
			'OperateFlag' => 'Operate Flag',
			'DeleteFlag' => 'Delete Flag',
			'CreateTime' => 'Create Time',
			'UpdateTime' => 'Update Time',
			'DeleteTIme' => 'Delete Time',
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

		$criteria->compare('PurviewId',$this->PurviewId);
		$criteria->compare('GroupId',$this->GroupId);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('Remark',$this->Remark,true);
		$criteria->compare('OperateFlag',$this->OperateFlag);
		$criteria->compare('DeleteFlag',$this->DeleteFlag);
		$criteria->compare('CreateTime',$this->CreateTime,true);
		$criteria->compare('UpdateTime',$this->UpdateTime,true);
		$criteria->compare('DeleteTIme',$this->DeleteTIme,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
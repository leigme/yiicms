<?php

/**
 * This is the model class for table "yc_annex".
 *
 * The followings are the available columns in table 'yc_annex':
 * @property integer $Id
 * @property integer $AnnexType
 * @property integer $ContentId
 * @property string $Title
 * @property string $AnnexPath
 * @property integer $OperateFlag
 * @property integer $DeleteFlag
 * @property string $CreateTime
 * @property string $UpdateTime
 * @property string $DeleteTime
 *
 * The followings are the available model relations:
 * @property YcAnnexType $annexType
 * @property YcContent $content
 */
class YcAnnex extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return YcAnnex the static model class
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
		return 'yc_annex';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('AnnexType, ContentId, OperateFlag, DeleteFlag', 'numerical', 'integerOnly'=>true),
			array('Title, AnnexPath, CreateTime, UpdateTime, DeleteTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, AnnexType, ContentId, Title, AnnexPath, OperateFlag, DeleteFlag, CreateTime, UpdateTime, DeleteTime', 'safe', 'on'=>'search'),
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
			'annexType' => array(self::BELONGS_TO, 'YcAnnexType', 'AnnexType'),
			'content' => array(self::BELONGS_TO, 'YcContent', 'ContentId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'AnnexType' => 'Annex Type',
			'ContentId' => 'Content',
			'Title' => 'Title',
			'AnnexPath' => 'Annex Path',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('AnnexType',$this->AnnexType);
		$criteria->compare('ContentId',$this->ContentId);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('AnnexPath',$this->AnnexPath,true);
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
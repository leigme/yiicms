<?php

/**
 * This is the model class for table "yc_content".
 *
 * The followings are the available columns in table 'yc_content':
 * @property integer $Id
 * @property integer $ColumnId
 * @property string $Title
 * @property string $ImagePath
 * @property integer $FileId
 * @property integer $Author
 * @property integer $OperateFlag
 * @property integer $DeleteFlag
 * @property string $CreateTime
 * @property string $UpdateTime
 * @property string $DeleteTime
 *
 * The followings are the available model relations:
 * @property YcAnnex[] $ycAnnexes
 * @property YcComment[] $ycComments
 * @property YcColumn $column
 * @property YcUser $author
 */
class YcContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return YcContent the static model class
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
		return 'yc_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Id', 'required'),
			array('Id, ColumnId, FileId, Author, OperateFlag, DeleteFlag', 'numerical', 'integerOnly'=>true),
			array('Title, ImagePath, CreateTime, UpdateTime, DeleteTime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, ColumnId, Title, ImagePath, FileId, Author, OperateFlag, DeleteFlag, CreateTime, UpdateTime, DeleteTime', 'safe', 'on'=>'search'),
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
			'ycAnnexes' => array(self::HAS_MANY, 'YcAnnex', 'ContentId'),
			'ycComments' => array(self::HAS_MANY, 'YcComment', 'ContentId'),
			'column' => array(self::BELONGS_TO, 'YcColumn', 'ColumnId'),
			'author' => array(self::BELONGS_TO, 'YcUser', 'Author'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'ColumnId' => 'Column',
			'Title' => 'Title',
			'ImagePath' => 'Image Path',
			'FileId' => 'File',
			'Author' => 'Author',
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
		$criteria->compare('ColumnId',$this->ColumnId);
		$criteria->compare('Title',$this->Title,true);
		$criteria->compare('ImagePath',$this->ImagePath,true);
		$criteria->compare('FileId',$this->FileId);
		$criteria->compare('Author',$this->Author);
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
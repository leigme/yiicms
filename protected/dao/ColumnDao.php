<?php

/**
 * 栏目DAO层方法
 * 
 * @author leig
 *
 */
class ColumnDao extends BaseDao {
	
	public function addColumn(YcColumn $column) {
		// 参数验证
		if (!isset($column) || 0 > $column->Id) {
			return YC_STATUS_NG;
		}
		
		// 构建插入对象
		$columnModel = new YcColumn();
		
		$columnModel->OrderNum = $column->OrderNum;
		$columnModel->Title = $column->Title;
		$columnModel->ParentId = $column->ParentId;
		$columnModel->OperateFlag = YC_OPEFLAG_DISABLED;
		$columnModel->DeleteFlag = YC_DELFLAG_NORMAL;
		$columnModel->CreateTime = date('Y-m-d H:i:s', time());
		$columnModel->UpdateTime = date('Y-m-d H:i:s', time());
		
		if(!$columnModel->insert()){
			return YC_STATUS_NG;
		}
		
		$Id = Yii::app()->db->getLastInsertID();
		// 返回成功Id
		return $Id;
	}
	
	public function selectColumn(YcColumn $column) {
		// 参数验证
		if (!isset($column)) {
			return YC_STATUS_NG;
		}
		
		// 构造模型
		$columnModel = YcColumn::model();
		// 需要查询的字段
		$sql = "t1.Id, t1.OrderNum, t1.Title, t1.ParentId, t1.ImagePath, t1.OperateFlag,
				t1.DeleteFlag, t1.CreateTime, t1.UpdateTime, t1.DeleteTime ";
		// 查询对象
		$criteria = new CDbCriteria();
		// 设置SQL语句
		$criteria->select = $sql;
		// 定义别名
		$criteria->alias = 't1';
		
		//         $joinSQL=' INNER JOIN {{user}} t2 ON t1.UserId=t2.Id ';
		//         $joinSQL=$joinSQL.' LEFT JOIN {{question}} t5 ON t1.QuestionId=t5.Id ';
		
		//         $criteria->join=$joinSQL;
		
		// 设置查询条件
		$criteria->addCondition('t1.OperateFlag = :p1');
		
		if (isset($column->OperateFlag) && 0 < $column->OperateFlag) {
			$conditionParams[':p1'] = $column->OperateFlag;
		} else {
			$conditionParams[':p1'] = SS_OPERATE_FLAG_ENABLED;
		}

		$criteria->addCondition('t1.DeleteFlag = :p2');
		$conditionParams[':p2'] = SS_DEL_FLAG_NORMAL;

		if (isset($column->Id) && 0 < $column->Id) {
			$criteria->addCondition('t1.Id = :p3');
			$conditionParams[':p3'] = $column->Id;
		}
		
		if (isset($column->Title) && !empty($column->Title)) {
			$criteria->addCondition('t1.Title = :p4');
			$conditionParams[':p4'] = $column->Title;
		}
		
		if (isset($column->ParentId) && 0 < $column->ParentId) {
			$criteria->addCondition('t1.ParentId = :p5');
			$conditionParams[':p5'] = $column->ParentId;
		}
		
		if (isset($column->ImagePath) && !empty($column->ImagePath)) {
			$criteria->addCondition('t1.ImagePath = :p6');
			$conditionParams[':p6'] = $column->ImagePath;
		}
		
		// 添加查询条件
		$criteria->params = $conditionParams;
		
		if (isset($column->OrderNum) && -1 == $column->OrderNum) {
			$criteria->addCondition('t1.ImagePath = :p7');
			$conditionParams[':p7'] = $column->ImagePath;
		}
		
		// 		$orderByString="t1.OrderNum ASC ";
		
		// 		$criteria->order= $orderByString;
		
		// 检索数据
		$resAllModelData = $columnModel->findAll($criteria);
		
		foreach ($resAllModelData as $itemData) {
			$un = $itemData->UserName;
			if ($userName === $un) {
				if ($passWord === $itemData->PassWord){
					return SS_STATUS_OK;
				}
			}
		}
		return SS_STATUS_NG;
	}
	
	public function updateColumn() {}
	
	public function deleteColumn() {}
}
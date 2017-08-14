<?php
/**
 * 用户表数据持久层操作对象
 * 
 * @author leig
 *
 */
class UserDao extends BaseDao {
    
    /**
     * 验证用户登录
     * 
     * @param 用户名 $username
     * @param 密码 $password
     * @return string
     */
    public function verifyLogin($username, $password) {
        
        // 去除空格
        $username = trim($username);
        $password = trim($password);
        
        // 验证参数
        if (!isset($username) || 0 >= count($username) 
            || !isset($password) || 0 >= count($password)) {
            return YC_STATUS_NG;
        }
        
        // 构造模型
        $userModel = YcUser::model();
        // 需要查询的字段
        $sql = "t1.Id, t1.Username, t1.Realname, t1.Password ";
        // 查询对象
        $criteria = new CDbCriteria();
        // 设置SQL语句
        $criteria->select = $sql;
        // 定义别名
        $criteria->alias = 't1';

        // 设置操作状态
        $criteria->addCondition('t1.OperateFlag = :p1');
        $conditionParams[':p1'] = YC_OPEFLAG_ENABLED;

        // 设置删除状态
        $criteria->addCondition('t1.DeleteFlag = :p2');
        $conditionParams[':p2'] = YC_DELFLAG_NORMAL;
        
        // 添加查询条件
        $criteria->params = $conditionParams;
        
        $orderByString = 't1.UpdateTime ASC ';
        
        $criteria->order = $orderByString;
        
        // 检索数据
        $resAllModelData = $userModel->findAll($criteria); 
        
        // 循环取到的对象匹配判断
        foreach ($resAllModelData as $itemData) {
            $un = $itemData->Username;
            if ($username === $un) {
                if ($password === $itemData->Password){
                    return YC_STATUS_OK;
                }
            }
        }
        
        return YC_STATUS_NG;
    }
}
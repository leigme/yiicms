<?php
//session_start();
class Tools {
    
    /**
     *  日志记录
     *
     * @param $msg 消息
     * @return $level 级别
     * @$className 类名
     *
     * info: 这个用于记录普通的信息。
     * profile: 这个是性能概述（profile）。
     * warning: 这个用于警告（warning）信息。
     * error: 这个用于致命错误（fatal error）信息。
     *
     */
    public static function YHLog($msg, $level, $className) {
        Yii::log($msg, $level, $className);
    }
    
    /**
     * 获得模型更新 添加 删除场合的 错误信息
     *
     * @param $modelObject 需要获得错误信息的 模型
     * @return string 得到的字符串
     * @author lifeng
     */
    public static function getModelErrorMsg($modelObject) {
        $errorMsg = "";
        foreach ($modelObject->getErrors() as $errorKey => $keyValue ){
            $errorMsg = $errorMsg.$errorKey.'--->'.implode(" ", $keyValue);
        }
        return $errorMsg;
    }
	
	/**
	 * 数组分组
	 * 
	 * @param 需要分组的数组 $array
	 * @param 需要分组的字段 $key
	 */
	public static function arrayGroup($array, $key) {
	    
	    foreach($array as $k=>$v) {
	        $result[$v[$key]][] = $v;
	    }
	    
	    return $result;
	}
	
	/**
	 * 设置主题CSS样式
	 *
	 * @param CSS样式文件名  $themeCSS
	 */
	public static function setThemeCSS($themeCSS) {
	
	    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.$themeCSS);
	
	}
	
	/**
	 * 设置主题JS文件
	 *
	 * @param JS文件名  $themeJS
	 */
	public static function setThemeJS($themeJS) {
	
	    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.$themeJS, CClientScript::POS_HEAD);
	
	}
}
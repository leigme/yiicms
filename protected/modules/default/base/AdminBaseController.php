<?php
/**
 * 后台管理基础控制器
 * 
 * @author leig
 *
 */
class AdminBaseController extends BaseController {
    
    /**
     * 验证登录
     * 
     * @return boolean[验证登录成功返回true;验证登录失败返回false]
     */
    public function verifyLogin() {
        
        return true;
    }
}
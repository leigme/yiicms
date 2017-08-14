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
  
        //用户名
		if (!isset($_SESSION['user']) || false === isset($_SESSION['user'])  
		    || empty($_SESSION['user']) || 0 >= strlen(trim($_SESSION['user']))
		    || !isset($_SESSION['pwd']) || false === isset($_SESSION['pwd']) 
		    || empty($_SESSION['pwd']) || 0 >= strlen(trim($_SESSION['pwd']))) {
            $this->redirect($this->ycGetPath('default/admin/login'));
            return YC_STATUS_NG;
		}

		$logic = new DefaultLogic();
		$result = $logic->verifyLogin($_SESSION['user'], $_SESSION['pwd']);

		if (YC_STATUS_OK == $result) {  
		    return YC_STATUS_OK;
		}
		
		$this->redirect('login');
		return YC_STATUS_NG;
    }
}
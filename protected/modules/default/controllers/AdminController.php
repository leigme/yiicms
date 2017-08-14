<?php
/*
 * 后台控制器
 * 
 * @author leig
 */
class AdminController extends AdminBaseController {
    
    /**
     * 用户登录
     */
    public function actionLogin() {
        // 设置CSS
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/signin.css');
        // 设置JS
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
         
        $this->layout = '//admin/layout';
    
        $model = YcUser::model();
    
        $this->render('login', array('model'=>$model,));
    }
    
    /**
     * 进入后台首页
     */
    public function actionIndex() {
        
        $result = $this->ycGetParam('isLogin');
        
        if (!isset($result) || false === isset($result)  
		    || empty($result) || 0 >= strlen(trim($result))) {
            $this->verifyLogin();
        }
        
        if ($result) {
            // 设置CSS
            Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
            Tools::setThemeCSS('/css/admin/dashboard.css');
            // 设置JS
            Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
             
            $this->layout = '//admin/layout';
            
            $this->render('index');
        }
    }
    
    /**
     * 验证登录
     * 
     * @return string
     */
    public function actionVerifyLogin() {
        
        if (!isset($_POST['YcUser'])) {
            return YC_STATUS_NG;
        }
        
        $model = new YcUser();
        
        $model->attributes = $_POST['YcUser'];
        
        $username = $model->Username;
        $password = $model->Password;
        $remmber = $model->OperateFlag;
        
        $logic = new DefaultLogic();

        $result = $logic->verifyLogin($username, $password);

        if (!isset($result) || YC_STATUS_NG == $result) {
            $this->redirect($this->ycGetPath('default/admin/login'));
        }

        if (1 == $remmber) {
            $_SESSION['user'] = $username;
            $_SESSION['pwd'] = $password;
        }
        
        $this->redirect(array('admin/index', 'isLogin'=>true));
//         $this->ycRedirect(array('default/admin/index', 'model'=>$model,));
    }
    
    /**
     * 登出操作
     */
    public function actionSignOut() {
        
        if (!isset($_SESSION['user']) || !isset($_SESSION['pwd'])) {
            $this->redirect($this->ycGetPath('default/admin/login'));
        }
        
        $_SESSION['user'] = NULL;
        $_SESSION['pwd'] = NULL;
        
        $this->redirect($this->ycGetPath('default/admin/login'));
    }
}
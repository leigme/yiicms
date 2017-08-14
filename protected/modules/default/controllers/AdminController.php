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
        
        $this->verifyLogin();
        
        // 设置CSS
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/dashboard.css');
        // 设置JS
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
         
        $this->layout = '//admin/layout';
        
        $this->render('index');
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
            $this->ycRedirect('default/admin/login');
        }

        if (1 == $remmber) {
            $_SESSION['user'] = $username;
            $_SESSION['pwd'] = $password;
        }
        
        $this->ycRedirect('default/admin/index');
    }
}
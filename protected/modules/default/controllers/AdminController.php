<?php

class AdminController extends AdminBaseController {
    
    public function actionIndex() {
        
        $this->verifyLogin();
        
        // 设置CSS
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/dashboard.css');
        // 设置JS
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
         
        $this->layout = '//admin/layout';
        
        $model = YcUser::model();
        
        $username = $model->Username;
        $password = $model->Password;
        $remmber = $model->OperateFlag;
        
        $logic = new DefaultLogic();
        
        $result = $logic->verifyLogin($username, $password);
        
        if (!isset($result) || YC_STATUS_NG == $result) {
            $this->ycRedirect('default/admin/login');
            return YC_STATUS_NG;
        }
        
        if (1 == $remmber) {
            $_SESSION['user'] = $username;
            $_SESSION['pwd'] = $password;
        }
        
        $this->render('index');
        
        return YC_STATUS_OK;
    }
    
    public function actionLogin() {
        // 设置CSS
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/signin.css');
        // 设置JS
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
         
        $this->layout = '//admin/layout';

        $model = YcUser::model();

        $this->render('index', array('model'=>$model,));
    }
}
<?php

class AdminController extends AdminBaseController {
    
    public function actionIndex() {
        if (!$this->verifyLogin()) {
            $this->ycRedirect($this, 'default/admin/login');
            return;
        }
        // 设置CSS
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/dashboard.css');
        // 设置JS
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
         
        $this->layout = '//admin/layout';

        $this->render('index');
    }
    
    public function actionLogin() {
        // 设置CSS
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/signin.css');
        // 设置JS
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
         
        $this->layout = '//admin/layout';

        $this->render('login');
    }
}
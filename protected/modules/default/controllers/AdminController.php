<?php

class AdminController extends AdminBaseController {
    
    public function actionIndex() {
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/dashboard.css');
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
        
        // 	    $this->setTheme('t01');
         
        $this->layout = '//admin/layout';
         
        $this->render('index');
    }
    
    public function actionLogin() {
        
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeCSS('/css/admin/signin.css');
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
        
        // 	    $this->setTheme('t01');
         
        $this->layout = '//admin/layout';
         
        $this->render('login');
    }
}
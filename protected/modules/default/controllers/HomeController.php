<?php

class HomeController extends BaseController {
    /**
     * 首页控制器
     */
    public function actionIndex() {
        
        Tools::setThemeCSS(YC_BOOTSTRAP_CSS.'bootstrap.min.css');
        Tools::setThemeJS(YC_BOOTSTRAP_JS.'bootstrap.min.js');
        
// 	    $this->setTheme('t01');
         
        $this->layout = '//'.$this->themePath.'/layout';
         
        $this->render($this->themePath.'/index');
    }
}
<?php

class BaseController extends Controller {
    
    public $themePath = 'default';
    
    public function setTheme($theme) {
        $this->themePath = YC_THEME_PATH.$theme;
    }
    
    public function ycRedirect(Controller $controller, $path) {
        $controller->redirect(Yii::app()->baseUrl.'/'.$path);
    }
    
    /**
     * 在项目之前运行
     * 
     * {@inheritDoc}
     * @see CController::beforeAction()
     */
    protected function beforeAction($action) {
    
//         $this->initWeb();
        
//         $this->setTheme();
    
        return true;
    }
}
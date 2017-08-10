<?php
// 如果缓存没有开启,则开启缓存
if(!isset($_SESSION)){
    session_start();
}
class BaseController extends Controller {
    
    // 默认主题
    public $themePath = 'default';
    
    /**
     * 设置主题
     * 
     * @param 主题字段 $theme
     */
    public function setTheme($theme) {
        $this->themePath = YC_THEME_PATH.$theme;
    }
    
    /**
     * 重定向跳转
     * 
     * @param 跳转控制器路径 $path
     */
    public function ycRedirect($path) {
        $this->redirect(Yii::app()->baseUrl.'/'.$path);
    }
    
    public function ycGetPath($path) {
        return Yii::app()->baseUrl.'/'.$path;
    }
    
    /**
     * 获取参数
     * 
     * @param 参数名称 $name
     * @return mixed|unknown|string
     */
    public function ycGetParam($name) {
        $result = Yii::app()->request->getParam($name, false);
        return $result;
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
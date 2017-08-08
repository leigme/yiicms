<?php

class DefaultController extends BaseController {
    
	public function actionIndex() {
// 	    $this->setTheme('t01');
	    
	    $this->layout = '//'.$this->themePath.'/layout';
	    
		$this->render($this->themePath.'/index');
	}
}
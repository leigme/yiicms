<?php

class DefaultController extends BaseController {
	public function actionIndex() {
	    $this->layout = '//default/layout';
	    
		$this->render('index');
	}
}
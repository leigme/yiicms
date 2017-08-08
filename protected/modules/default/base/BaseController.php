<?php

class BaseController extends Controller {
    
    public $themePath = 'default';
    
    public function setTheme($theme) {
        $this->themePath = YC_THEME_PATH.$theme;
    }
    
}
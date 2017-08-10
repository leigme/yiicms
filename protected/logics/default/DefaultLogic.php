<?php

class DefaultLogic extends BaseLogic {   

    public function verifyLogin($username, $password) {
        
        if (!isset($username) || !isset($password)) {
            return YC_STATUS_NG;
        }
        
        $userDao = new UserDao();
        
        $result = $userDao->verifyLogin('admin', '123456');
        
        return $result;
    }
    
}
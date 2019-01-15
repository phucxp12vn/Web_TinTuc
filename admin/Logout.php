<?php

$identity = new Apps_Libs_UserIdentity();
$router = new Apps_Libs_Router();
if($identity->isLogin()){
    $identity->logout();
}
    $router->loginPage();

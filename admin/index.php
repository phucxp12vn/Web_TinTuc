<?php
include '../apps/bootstrap.php';

//$a = new Apps_Models_Users();
//$result = $a->buildQueryParams([
//   "fields"=> '(name,email,password) values (?,?,?)',
//    "value"=> ['Phuc','vphuc8230tth@gmail.com', md5('123456')]
//])->insert();
//
//var_dump($result);


$router = new Apps_Libs_Router(__DIR__);
$router->router();

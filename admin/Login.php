<?php
$router = new Apps_Libs_Router();

$account = trim($router->getPOST('account'));
$password = trim($router->getPOST('password'));
$identity = new Apps_Libs_UserIdentity();
if($identity->isLogin()){
    $router->homePage();
}

if($router->getPOST('submit') && $account && $password){
    $identity->username = $account;
    $identity->password = $password;
    if($identity->login()){
        header("Location:?r=home");
    }else{
        echo 'Dang nhap that bai';
    }
}

?>


<html>
    <body>
        <div>
            <p>Login</p>
        </div>
        <form method="post" action="<?php echo $router->createURL('login')?>">
            Email:
            <br>
            <input type="text" name="account"><br>
            Password:<br>
            <input type="password" name="password"><br>
            <input type="submit" name="submit" value="login">            
        </form>
    </body>
</html>
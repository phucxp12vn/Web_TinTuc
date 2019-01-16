<?php
header("Content-type: text/html; charset=utf-8");
$theloai = new Apps_Models_Theloais();
$router = new Apps_Libs_Router();
$user = new Apps_Libs_UserIdentity();

$id = intval($router->getGET('id'));

if($id){
    $theloaiDetail = $theloai->buildQueryParams([
        'where'=>"id = :id",
        'params'=> [':id'=>$id]
    ])->select();
    if(!$theloaiDetail){
        $router->pageNotFound();
    }    
}

if($router->getPOST('id') && $router->getPOST('Ten')){
    $params = [ 
      'id'=> $id,
      'Ten'=>  $router->getPOST('Ten'),
      'TenKhongDau'=> $router->getPOST('TenKhongDau'),
      'updated_at'=> date("Y-m-d",time())
    ];
    $result = false;
    if($id){
     $result = $theloai->buildQueryParams([
         "value"=>"name= :name",
         'where'=> "id = :id",
         'params'=> $params
     ])->update();
    }
}
?>

<html>
    <body>
        <div>
              <h3>Hello: <?php echo $user->getId(); ?></h3>
              <a href="<?php echo $router->createURL('logout')?>"><h4>Logout</h4></a>
              <h1>Chi tiet the loai</h1>
        </div>
        <div class="show-data">
            <form action="<?php echo $router->createURL('theloai/detail',['id'=> $row['id']])?>" method="post">
                <p>id:</p>
                <input type="text" name="id" value="<?= $theloaiDetail[0]['id'] ?>"><br>        
                <p>Ten:</p>
                <input type="text" name="Ten" value="<?= $theloaiDetail[0]['Ten'] ?>"><br>
                <p>Ten khong dau:</p>
                <input type="text" name="TenKhongDau" value="<?= $theloaiDetail[0]['TenKhongDau'] ?>"><br>
            </form>
        </div>
            
    </body>
</html>


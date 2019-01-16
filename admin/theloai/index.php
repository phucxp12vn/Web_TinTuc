<?php
header("Content-type: text/html; charset=utf-8");
$theloai = new Apps_Models_Theloais();
$query = $theloai->buildQueryParams()->select();
$router = new Apps_Libs_Router();
$user = new Apps_Libs_UserIdentity();
?>

<html>
    <body>
        <div>
              <h3>Hello: <?php echo $user->getId(); ?></h3>
              <a href="<?php echo $router->createURL('logout')?>"><h4>Logout</h4></a>
              <h1>Quan ly the loai</h1>
        </div>
        <div class="show-data">
            <table style="width:100%" border="1">
                <tr>
                    <td>Id</td>
                    <td>Tên</td>
                    <td>Tên không dấu</td>
                    <td>Ngày tạo</td>
                    <td>Cập nhật</td>
                    <td>Thao tác</td>
                </tr>
                <?php foreach($query as $row){ ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['Ten'] ?></td>
                    <td><?= $row['TenKhongDau'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                    <td><?= $row['updated_at'] ?></td>
                    <td>
                        <a href="<?php echo $router->createURL('theloai/detail',['id'=> $row['id']])?>">Sửa</a>
                        <a href="<?php echo $router->createURL('theloai/delete',['id'=> $row['id']])?>">Xóa</a>
                    </td>                    
                </tr>
                <?php } ?>
            </table>
        </div>
            
    </body>
</html>
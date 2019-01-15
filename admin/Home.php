<?php

$user = new Apps_Libs_UserIdentity();
$router = new Apps_Libs_Router();
 
 ?>
 <html>
 <body>
     <h3>Hello: <?php echo $user->getId(); ?></h3>
     <a href="<?php echo $router->createURL('logout')?>"><h4>Logout</h4></a>
     <h1>Page Admin</h1>
     <div class="show-data">
         <ul>
             <li><a href="<?= $router->createURL('theloai/index')?>">Thể loại</a></li>
         </ul>
     </div>
 </body>
 </html>
<?php
require'./core/articles.php';
if(isset($_SESSION['admin'])){
   require('./admin/admin_header.php');
}else{
    if(isset($_SESSION['user_name'])!=''){
    require('./users/user_header.php');
//    require('./blog/header.php');
}else{
    require('./blog/header.php');

    }
}

require ('./blog/contents.php');
require ('./blog/footer.html');
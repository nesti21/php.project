<?php
namespace userspost;
include 'db.php';

var_dump($_SESSION['user_id']);
Class UP extends \database\DB{
    public $listdata;
    public function getUsersPost(){
        
        $sql_param= [
              'table'=>'articles',
              'table2'=> 'users',
               'constraint'=> 'articles.fk_users = users.user_id',
               'where'=> 'user_id="'.$_SESSION['user_id'].'"'
        ];
        
        $this->listdata = $this->getData($sql_param);
        var_dump($this->listdata);
    }
//    echo date("Y-m-d H:i:s");
    
    
    
}

if(isset($_SESSION['user_id'])){
$userpost = new UP();
$userpost->getUsersPost();
}else {
     header('location:../blog/logins.php');
}
?>

<?php 
namespace deleteusers;
include 'userlist.php';

Class DelUser extends \database\DB {
   
    public function  delete(){
      
    if(isset($_POST['delte_user'])){
        $id = $_POST['delte_user'];
        echo '<p class ="danger">User '.$id.' was delete</p>';
        $this->deleteData('users','user_id',$id);
        }
       }
}

$userdel = new DelUser();
$userdel->delete();
 
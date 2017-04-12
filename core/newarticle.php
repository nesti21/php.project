<?php
namespace newarticle;

include 'formgen.php';
include 'db.php';
$forms = new \forms\FRM();
$forms->ArrayIndexer_POST();

Class NA extends \database\DB{
       public $data;
       public $errors = array();
    
       public function newpost (){
           $this->data = $_POST;
           
           if(isset($this->data['newpost'])){
          
               var_dump($this->data);
           $sql_param = [
                'table'=> 'articles',
                 'params'=>'title,content,dates,fk_users',
                  'values'=>'"'.$this->data['title'].'","'.$this->data['textarea'].'","'.date("Y-m-d H:i:s").'","'.$_SESSION['user_id'].'"'
                ];
           if(trim($this->data['title']) == ''){
               $this->errors[] = 'Please type Title';
           }
           if(trim($this->data['textarea']) == ''){
               $this->errors[] = 'Please type Post';
           }
           if(empty($this->errors)){
                $this->InsertData($sql_param);
           } else {
                echo'<p class="bg-warning"style="color:black">'.array_shift($this->errors).'</p>';
           }
           
           
           
       }     
    }
}
echo "Today is " .date("Y-m-d H:i:s"). "<br>";
if(isset($_SESSION['user_id'])){
    $newarticles = new NA();
    $newarticles->newpost();
} else {
   header('location:../blog/logins.php');
}


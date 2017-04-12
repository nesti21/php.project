<?php
namespace login;
include 'formgen.php';
include 'db.php';
$forms = new \forms\FRM();
 
 $forms-> ArrayIndexer_LOGIN();
 
Class LG extends \database\DB {
    
    public $data;
    public $errors = array();
    public $errors2 = array();
    public $listdata;
//    public $user;

    
    public function redirect() {
//    header('location:index.php');
}

    public function login(){
        $this->data = $_POST;
//        var_dump($this->data);
        
        if(isset($this->data['sign_in'])){
            
            $this->sql_select = [
                'table'=>'users'
        ];
            
            if(trim($this->data['login']) == ''){
               $this->errors[] = 'Please type Login';
           }
     
          
           if($this->data['password'] == ''){
               $this->errors[] = 'Please type password';
           }
           
           if(empty($this->errors)){
               
               $this->listdata =  $this->getData($this->sql_select);
                 
                 foreach ($this->listdata as $index=>$row){
                   
                   if(trim($this->data['login']) == $row['users_login']){
                        //var_dump($row);
                       if(password_verify($this->data['password'],$row['users_passwords'])){
//                           var_dump($row);
                           $_SESSION['user_name'] = $row['users_name'];
                           $_SESSION['user_login'] = $row['users_login'];
                           $_SESSION['user_id'] = $row['user_id'];
                           
                           if($row['user_level' ]=='admin'){
                               
                               $_SESSION['admin']= 'admin';
                           }
                           
                           $this->redirect();
                           
//                           session_destroy();
                           var_dump($_SESSION);
                           
                       if($row['user_level'] == 'admin'){
                           echo 'Admin';
                     }
                       }else{
                            echo 'Password no correct';break;
                       }
                     
                      
                   }else{
                     
//                       echo 'Batman doesn\'t know you';break;
                   
                   }
                   
               }
               
            }else{
                echo'<p class="bg-warning"style="color:black">'.array_shift($this->errors).'</p>';
            }
        }
    }
    
}
$login = new LG();
$login->login();
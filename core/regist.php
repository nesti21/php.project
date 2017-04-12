<?php
namespace registration;
include 'formgen.php';
include 'db.php';

 $forms = new \forms\FRM();
 
 $forms-> ArrayIndexer_REGIST();
  
Class RG extends \database\DB {
    
    public $listdata;
    public $data;
    public $errors = array();
    public $sql_insert;

    public function registration(){
        $this->data = $_POST;
        
     
        
        if(isset($this->data['sign_up'])){
            
            $this->sql_insert = [
                'table'=>'users',
                 'params'=>'users_name,users_login,users_mail,users_passwords',
                 'values'=>'"'.$this->data['name'].'","'.$this->data['login'].'","'.$this->data['email'].'","'.password_hash($this->data['password'],PASSWORD_DEFAULT).'"'
            ];
            
             
            
           if(trim($this->data['login']) == ''){
               $this->errors[] = 'Please type Login';
           }
            if(trim($this->data['name']) == ''){
               $this->errors[] = 'Please type Name';
           }
            if(trim($this->data['email']) == ''){
               $this->errors[] = 'Please type email';
           }
           if($this->data['password'] == ''){
               $this->errors[] = 'Please type password';
           }
           
            
            if(empty($this->errors)){
               $this->InsertData($this->sql_insert);
               echo '<p class="bg-success"style="color:black">Welcome to Hooli-Blog '.$this->data['name'].'</p>';
            }else{
                echo'<p class="bg-warning"style="color:black">'.array_shift($this->errors).'</p>';
            }
            
            
        }         
    }
        
}
$regist = new RG();
$regist->registration();


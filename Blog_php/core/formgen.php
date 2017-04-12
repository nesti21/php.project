<?php
namespace forms;

//session_start();

Class FRM {
    
public $structure_regist = array(
            array(
                'type' => 'formStart',
                'method' => 'POST',
                'action' => ''
            ),
            array(
                'type' => 'textFiled_regist',
                'name' => 'login',
                'id' => 'login',
                'label' => 'Login: ',
                'class' => 'form-control'
            ),
    
            array(
                'type' => 'textFiled_regist',
                'name' => 'name',
                'id' => 'name',
                'label' => 'Name: ',
                'class' => 'form-control'
            ),
  
            
            array(
                'type' => 'email',
                'name' => 'email',
                'id' => 'email',
                'label' => 'Email: ',
                'class' => 'form-control'
            ),
            
             array(
                'type' => 'password',
                'name' => 'password',
                'id' => 'password',
                'label' => 'Pass: ',
                 'class' => 'form-control'
            ),
            
             array(
                'type' => 'button_regist',
                'name' => 'sign_up',
                 'id' => 'button',
                 'value'=>'Register',
                 'class'=> 'btn btn-info btn-block'
            ),
    
     
    
            
            array(
                'type' => 'formEnd'
            )
        );

public $structure_login = array(
            array(
                'type' => 'formStart',
                'method' => 'POST',
                'action' => ''
            ),
            array(
                'type' => 'textFiled_login',
                'name' => 'login',
                'id' => 'login',
                'label' => 'Login: ',
                'class' => 'form-control'
            ),
    
      
             array(
                'type' => 'password',
                'name' => 'password',
                'id' => 'password',
                'label' => 'Pass: ',
                 'class' => 'form-control'
            ),
            
             array(
                'type' => 'button_login',
                'name' => 'sign_in',
                 'id' => 'button',
                 'value'=>'Login',
                 'class'=> 'btn btn-primary'
            ),
    
     
    
            
            array(
                'type' => 'formEnd'
            )
        );



public $structure_article_post = array(
            array(
                'type' => 'formStart',
                'method' => 'POST',
                'action' => ''
            ),
            array(
                'type' => 'textFiled_title',
                'name' => 'title',
                'id' => 'title',
                'label' => 'Title: ',
                'class' => 'form-control'
            ),
    
      array(
                'type' => 'textarea',
                'name' => 'textarea',
                'id' => 'textarea',
                'label' => 'Your Text',
               
            ),
            
            
                array(
                'type' => 'button_post',
                'name' => 'newpost',
                'id' => 'button',
                'value'=>'Publick',
                'class'=> 'btn btn-danger'
            ),
    
     
    
            
            array(
                'type' => 'formEnd'
            )
        );

public $structure_delete_user = array(
    
     array(
                'type' => 'formStart',
                'method' => 'POST',
                'action' => ''
            ),
    
    array(
                'type' => 'button_delete',
                'name' => 'delete',
                 'id' => 'button',
                 'value'=>'Delete',
                 'class'=> 'btn btn-dangerous'
         ),
    
    array(
                'type' => 'formEnd'
            )
);

    
    
    

        public function createFormStart($data) {
            $result = '';

            $result .= '<form';
            $result .= isset($data['method']) ? ' method="' . $data['method'] . '"' : ' POST';
            $result .= isset($data['name']) ? ' name="' . $data['name'] . '"' : '';
            $result .= isset($data['action']) ? ' action="' . $data['action'] . '"' : ' action=""';
            $result .= isset($data['id']) ? ' id="' . $data['id'] . '"' : '';
            
                
            $result .= '>' . PHP_EOL;

            return $result;
        }

        public function createFormEnd() {
            $result = '</form>' . PHP_EOL;
            return $result;
        }

        public function createTextFiled($data) {
            $result = '<p>';
            $result .= isset($data['label']) ? $data['label'] : '';
            $result .= '<input';
            $result .= isset($data['type']) && $data['type'] != 'textFiled' ? ' type="' . $data['type'] . '"' : ' type="text"';
            $result .= isset($data['name']) ? ' name="' . $data['name'] . '"' : '';
            $result .= isset($data['id']) ? ' id="' . $data['id'] . '"' : '';
          $result .= isset($data['class']) ? ' class="' . $data['class'] . '"' : '';
            $result .= ' value="' . $this->postData($data['name']) . '"';

            $result .= ' /></p>' . PHP_EOL;
            
            
//            $this->saveData($data['name'], $this->postData($data['name']));
        
            
            
            return $result;
        }

    
        public function postData($name) {
            $result = '';

            if (isset($_POST[$name])) {
                $result = $_POST[$name];

                if (is_array($result)) {
                    $result_array = array();
                    foreach ($result as $key => $value) {
                        $result_array[$key] = trim(htmlspecialchars(strip_tags($value)));
                    }
                    $result = $result_array;
                } else {
                    $result = strip_tags($result); //remove tags
                    $result = htmlspecialchars($result);
                    $result = trim($result); //remove spaces
                }
            }

            return $result;
        }
//        public function saveData($key, $value){
//            if($value == ''){
//                unset($_SESSION[$key]);
//            }
//            else{
//                $_SESSION[$key] = $value;
//            }
//
//        }

        public function createButton($data) {
            $result = '<p>';
            $result .= '<button';
            $result .= ' type="submit"';
            $result .= isset($data['name']) ? ' name="' .$data['name']. '"' : '';
            $result .= isset($data['id']) ? ' id="' . $data['id'] . '"' : '';
            $result .= isset($data['class']) ?' class="'.$data['class'].'"':'';
            $result .= ' >';
            $result .= isset($data['value']) ? $data['value'] : '';
            $result .= '</button></p>' . PHP_EOL;
            return $result;
        }
        
        
         function createTextArea($data){
            $result = '<p>';
            $result .= isset($data['label']) ? $data['label'] : '';
            $result .= '<textarea';
            $result .= isset($data['type']) && $data['type'] != 'textarea' ? ' type="' . $data['type'] . '"' : ' type="textarea"';
            $result .= isset($data['name']) ? ' name="' . $data['name'] . '"' : '';
            $result .= isset($data['id']) ? ' id="' . $data['id'] . '"' : '';
            $result .= '>';
            $result .= ' </textarea></p>';
            return $result;
        }
        
        public function ArrayIndexer_REGIST(){
 
        foreach ($this->structure_regist as $type => $row) {
            switch ($row['type']) {
                case 'textFiled_regist':
                case 'password':
                case 'email':
                    echo $this->createTextFiled($row);
                    break;
                case 'button_regist':
                    echo $this->createButton($row);
                    break;
                case 'formStart':
                    echo $this->createFormStart($row);
                    break;
                case 'formEnd':
                    echo $this->createFormEnd();
                    break;

                default:
                    echo '<p>Error! Illegal form element</p>';
                    break;
            }
        }
        
        
        
         if (!empty($_POST)) {
            echo '<pre>';
            var_dump($_POST['login']);
            echo '</pre>';
        }
        
}


 public function ArrayIndexer_LOGIN(){
 
        foreach ($this->structure_login as $type => $row) {
            switch ($row['type']) {
                case 'textFiled_login':
                case 'password':
               
                    echo $this->createTextFiled($row);
                    break;
                case 'button_login':
                    echo $this->createButton($row);
                    break;
                case 'formStart':
                    echo $this->createFormStart($row);
                    break;
                case 'formEnd':
                    echo $this->createFormEnd();
                    break;

                default:
                    echo '<p>Error! Illegal form element</p>';
                    break;
            }
        }
        
        
        
         if (!empty($_POST)) {
            echo '<pre>';
            var_dump($_POST['login']);
            echo '</pre>';
        }
        
}


public function ArrayIndexer_POST(){
 
        foreach ($this->structure_article_post as $type => $row) {
            switch ($row['type']) {
                case 'textFiled_title':
                    echo $this->createTextFiled($row);
                    break;
                case 'textarea':
                    echo $this->createTextArea($row);
                    break;
                case 'button_post':
                    echo $this->createButton($row);
                    break;
                case 'formStart':
                    echo $this->createFormStart($row);
                    break;
                case 'formEnd':
                    echo $this->createFormEnd();
                    break;

                default:
                    echo '<p>Error! Illegal form element</p>';
                    break;
            }
        }
        
        
        
//         if (!empty($_POST)) {
//            echo '<pre>';
//            var_dump($_POST['login']);
//            echo '</pre>';
//        }
        
}

public function ArrayIndexer_DELETE_USER(){
 
        foreach ($this->structure_article_post as $type => $row) {
            switch ($row['type']) {
                case 'button_button_delete':
                    echo $this->createButton($row);
                    break;
                case 'formStart':
                    echo $this->createFormStart($row);
                    break;
                case 'formEnd':
                    echo $this->createFormEnd();
                    break;

                default:
                    echo '<p>Error! Illegal form element</p>';
                    break;
            }
        }
        
        
        
}


       
        
   }
        
//        $_SESSION;
        
        
  
<?php
namespace userlist;
include 'db.php';
Class UL extends \database\DB{
    public $listada;
    public function allusers(){
        $sql_param = [
            'select'=>'user_id,users_login',
             'table'=> 'users'
        ];
          
        $this->listada = $this->getData($sql_param);
         $result = '';
         $result.='<table class="table-hover" cellpadding="5" cellspacing="0" border="1">';
        foreach ($this->listada as $index){
            $result.= '<tr><td>'.$index['user_id'].'</td>';
            $result.= '<td>'.$index['users_login'].'</td>';
             $result.= '<td>'
                     .'<form method="Post">'
                    .'<button type="submit" name="delte_user" value="'.$index['user_id'].'"</td>Delete</button>'.
                     '</form>'.
                       '</td>';
                     
        }
        $result.='</table>';
        
      
       
       echo $result;
    }
}
$users = new UL();
$user = $users->allusers();
<?php
namespace articles;
//use \database\DB;

include 'db.php';
//include 'regist.php';

//$DB = new\database\DB();
//
//$sql_param = [
//   'table'=>'articles',
//   'table2'=> 'users',
//    'constraint'=> 'articles.fk_users = users.user_id'
//];
//
//$listdata = $DB->getData($sql_param);
//
//$articles = array();
//
//foreach ($listdata as $index => $row){
//   
////echo $row['content'];
//    $articles[] = $row;
//   
//}




//echo var_dump($articles);






Class ART extends \database\DB{
    public $article_id;
    public $artic;
    public $article;


    public $sql_param= [
              'table'=>'articles',
              'table2'=> 'users',
              'constraint'=> 'articles.fk_users = users.user_id'
        ];
    
        


    public $listdata;
    public $articles= array();

//OL ARTICLES
    public function getArticles(){
        
        $this->listdata = $this->getData($this->sql_param);
        
        foreach ($this->listdata as $index => $row){
             $this->articles[] = $row;
        }
        return $this->articles;
    }
    
    
    //ONE ARTICLE
    public function getArticle($id){
        if(isset($id) && $id!=NULL){
        $this->article_id = $id;
        
       $sql_param2=[
           
             'table'=>'articles',
             'table2'=> 'users',
             'constraint'=> 'articles.fk_users = users.user_id',
             'where'=> 'articles.articles_id ='.$this->article_id
        ];
       
        $this->article=$this->getData($sql_param2);
        
        foreach ($this->article as $index => $row){
            $this->art[] = $row;
        }
        return $this->art;
        
      } else {
          $id = 0;
      }
    }
   
    
    
}

$content = new ART();

$articles = $content->getArticles();

$article = $content->getArticle($_GET['id']);
//var_dump($article);








<div class="container" style="min-height:100vh">
    
   
        
    <div class="col-md-10 col-md-offset-1" style="margin-top:5%">
    <? foreach ($articles as $ar): ?>
       
    <div class="media" style="background-color:rgba(255, 255, 255, 0.66);">
        
  <div class="media-left">
      
<!--    <a href="#">
      <img class="media-object" src="" alt="image">
    </a>-->
      
  </div>
        
        <div class="media-body">
      
      <a href="./blog/content.php?id=<?echo $ar['articles_id']?>">
          
          <h2 class="media-heading" style="margin:5% 0 5% 0 "> <?echo $ar['title']?> </h2>
    
     </a>
    
    <h4><?echo mb_substr( strip_tags($ar['content']),0,200). ' ...'?></h4>
  </div>
   <blockquote class="blockquote-reverse">
       <p><?echo $ar['dates']?></p>
       <footer>
           Author: <?echo $ar['users_name']?>
       </footer>
</blockquote>
        
</div>       
            
    <?php endforeach; ?>
       </div>
     <?php //include('./blog/aside.php') ?>
 
</div>
   
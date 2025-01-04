<?php
if(comments_open()){
  $comments_args = array(
    "max_depth"=>3 ,
    "type"=>"comment"
  );
?>
  <h4><?php comments_number('0 comment' , 'one comment' , "%comments") ?></h4>
<?php
  echo "<ul class='list-unstyled comments-list'>";
    wp_list_comments($comments_args) ;
  echo "</ul>";
}else {
  echo "sory comments of this post is disabled";
}














 ?>

<?php 
require_once('db.php');
$id  = $_POST['id'];
$comment  = $_POST['comment'];

                         $query ="UPDATE comments SET reply='$comment' WHERE comment_id=$id";
                         $result_set = mysqli_query($conn, $query);
                         if($result_set){
                        
                         }else{
                          echo $connection->error;
                         }     
                        
              ?> 
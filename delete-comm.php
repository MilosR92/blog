<?php include('povezivanjeBaze.php');
   $commentId = $_POST['commentId'];
   $postId= $_POST['post_id'];

   if(isset($commentId)){
       $sql2 = "DELETE FROM comments WHERE id=" . $commentId;
       $statment2 = $connection->prepare($sql2);
       $statment2->execute();
   }

   header("Location:single-post.php?post_id={$_POST['post_id']}");
?>
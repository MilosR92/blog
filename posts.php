<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('header.php');

include('povezivanjeBaze.php');

?>
<main role="main" class="container">

<div class="row">

   <div class="col-sm-8 blog-main">


<?php
   $sql = "SELECT * from posts order by Created_at DESC";
   $statment = $connection->prepare($sql);
   $statment->execute();
   $statment->setFetchMode(PDO::FETCH_ASSOC);
   $posts = $statment->fetchAll();


?>
<?php
   foreach ($posts as $post){
?>

   <div class="blog-post">
       <h2 class="blog-post-title"><a href="single-post.php?post_id='<?php echo $post['Id'];?>'"><?php echo ($post['Title']);?></h2>
       <p class="blog-post-meta"><?php echo ($post['Created_at']);?> <a href="#"><?php echo ($post['Author']);?></a></p>
       <p><?php echo ($post['Body']);?></p>
       <hr>
   </div>

<?php
}
?>

<?php
include('sidebar.php');
include('footer.php');

?>
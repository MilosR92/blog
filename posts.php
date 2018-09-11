<?php
include('header.php');


include('povezivanjeBaze.php')
?>

<main role='main' class='container'>
<div class='row'>
    <div class='col-sm-8 blog main'>

<?php

    $sql = 'SELECT * FROM posts ORDER BY Created_at desc';
    $statment = $connection->prepare($sql);
    $statment->execute();
    $statment->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statment->fetchALL();
?>

<?php
    foreach($posts as $post) {


    
?>
    <div class="blog-post">
                <h2 class="blog-post-title"><a href="single-post.php?posts_id='<?php echo $post['Id'];?>'"><?php echo ($post['Title'])?></h2>
                <p class="blog-post-meta"><?php echo ($post['Created_at'])?><a href="#"><?php echo ($post['Author'])?></a></p>
                <p> <?php echo ($post['Body'])?></p>
                <hr>
    </div>
    
  
<?php
};
?>
<?php
include('footer.php');
include('sidebar.php');
?>
    
<?php
include('header.php');
include('footer.php');

include('povezivanjeBaze.php')
?>

<?php

$sql = "SELECT * FROM posts WHERE posts.id = {$_GET['posts_id']}";
$statment = $connection->prepare($sql);
$statment->execute();
$statment->setFetchMode(PDO::FETCH_ASSOC);
$singlepost = $statment->fetch();
?>


<h2 class="blog-post-title"><?php echo ($singlepost['Title']);?></h2>
                <p class="blog-post-meta"><?php echo ($singlepost['Created_at']);?><a href="#"><?php echo ($singlepost['Author']);?></a></p>
                <p> <?php echo ($singlepost['Body']);?></p>
                <hr>

<?php
include('sidebar.php');
?>

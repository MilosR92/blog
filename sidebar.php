<?php
include('povezivanjeBaze.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<aside class="col-sm-3 ml-sm-auto blog-sidebar">
           <div class="sidebar-module sidebar-module-inset">
                <h4>Latest posts</h4>

            <?php
                $sql= "SELECT Title, Id FROM posts ORDER BY Created_at DESC LIMIT 5";
                $statment = $connection->prepare($sql);
                $statment->execute();
                $statment->setFetchMode(PDO::FETCH_ASSOC);
                $postsId = $statment->fetchAll();


            ?>

            <?php foreach($postsId as $postId) { ?>
            <div>
                <a href="single-post.php?post_id='<?php echo $postId['Id'];?>'"><?php echo ($postId['Title'])?> </a>
            </div>

            <?php } ?>

       </aside>
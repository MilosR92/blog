<?php
   include('header.php');

   include('povezivanjeBaze.php');
   $postsId =$_GET["post_id"];

  $sql = "SELECT posts.Id as posts_id, posts.Title as Title, posts.Body, posts.Author as post_author, posts.Created_at as Created_at, comments.author as comments_author, comments.text,
  comments.id as comments_id, comments.created_at
  from posts
  left join comments on comments.post_id = posts.id
  where posts.id=" . $postsId;
  $statement = $connection->prepare($sql);
  $statement->execute();
  $statement->setFetchMode(PDO::FETCH_ASSOC);
  $singlePostsComms = $statement->fetchAll();
?>



<div class="blog-post">
  <h2 class="blog-post-title"><?php echo ($singlePostsComms[0]['Title'])?></h2>
  <p class="blog-post-meta"><?php echo ($singlePostsComms[0]['Body']); echo '<br> ' ;echo($singlePostsComms[0]['post_author']); echo '<br>'; echo ($singlePostsComms[0]['Created_at'])?> </p>
    <br>


<script>
    function areYouSure(){
    var sure = prompt('Are you sure? (yes/no)');
    if(sure == 'yes' || sure == 'Yes'){
         return true;
         } else {
          return false;
        }
      }

</script>

<h3>Comments:</h3>


<form name='commentForm' action='create-comment.php' onsubmit='return addComment()' method='post'>

  <label for="author">Your name:</label>
  <input name="author" type="text" ><br>
  <small>Your name and comment will be public!</small><br>


  <label for="text">Your comment:</label>
  <input name="text" type="text">
  <input type="hidden"  name="post_Id" value=<?php echo($postsId); ?> ><br>
  <button id ="commentBtn" type="submit" class="btn-btn-default">Post comment</button><br>


</form>

<script> 
  function addComment (){
      var authorInput = document.forms['commentForm']['author'];
      var textInput = document.forms ['commentForm']['text'];
      var author =document.forms ['commentForm']['author'].value;
      var text = document.forms ['commentForm']['text'].value;

           if (!author || !text) {
               if (!author) {
                   authorInput.classList.add('alert');
                   authorInput.classList.add('alert-danger');
                   authorInput.addEventListener('input', function (){
                       authorInput.classList.remove('alert');
                       authorInput.classList.remove('alert-danger');

                   })
          }
          if(!text) {
                    textInput.classList.add('alert');
                    textInput.classList.add('alert-danger');
                    textInput.addEventListener('input', function(){
                       textInput.classList.remove('alert');
                       textInput.classList.remove('alert-danger');
                           })
                       }
                       alert('Both fields are required!');
                       return false;
                   }
               }
               </script> 

<button class="btn btn-default" id='hideBtn' onclick="hideFun()">Hide comments</button>



        <div id="singleComment">
            <ul>
            <?php foreach($singlePostsComms as $singlePostsComm) {?>
                <li>
                    <hr>
                        <div>posted by: <strong><?php echo($singlePostsComm['comments_author']); ?>
                        </strong> <?php echo ($singlePostsComm['created_at']) ?></div>

                    <div><?php echo($singlePostsComm['text']); ?></div>
                </li>

                 <form action="delete-comm.php" method="post" name="deleteForm">
                     <input name="post_id" type="hidden" value="<?php echo $postsId ?>">
                     <input name="commentId" type="hidden" value= "<?php echo ($singlePostsComm['comments_id'])?>">
                     <button id="deleteBtn" type = "submit" class= "btn btn-default">Delete comment</button>
                  </form>

                <?php  } ?>
            </ul>

        </div>
        <br>
        <br>

        <script src = "hideButton.js">
            
        </script>



<?php   include('footer.php');
    include('sidebar.php');
    ?>
</div>
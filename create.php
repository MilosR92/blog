<?php include ('header.php'); ?>

   <div>
       <form name="postForm" action="create-post.php" method="post" onsubmit="return addPost()">
           <label for="Title">Title: </label><br>
           <input type="text" name="Title"><br><br>
           <label for="Author">Your Name:</label><br>
           <input type="text" name= "Author"><br><br>
           <label for="Body">Content: </label><br>
           <textarea name="Body" id="" cols="50" rows="20"></textarea><br>
           <button class="btn btn-default" type="submit">Create post</button><br><br>
       </form>

   </div>

           <?php include('sidebar.php'); ?>

       </div>
   </main>

   <script>
       function addPost(){
           var title = document.forms['postForm']['Title'].value;
           var body = document.forms['postForm']['Body'].value;

           if(!title || !body){

           }
           alert('Both fields are required!');
               return false;
       }
   </script>

<?php  include('footer.php'); ?>
<?php
if(isset($_POST['create_post'])){
   $post_title = $_POST['title'];
   $post_author= $_POST['post_author'];
   $post_category_id= $_POST['post_category'];
   $post_status= $_POST['post_status'];
  
   $post_image=$_FILES['image']['name']; 
   $post_image_temp=$_FILES['image']['tmp_name'];   
  
   $post_tags= $_POST['post_tags'];
   $post_content= $_POST['post_content'];
   $post_date= date('d-m-y');
   //$post_comment_count= 4;
  
  move_uploaded_file($post_image_temp,"../images/$post_image");
  
 
  $query= "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) Values ('$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";
 
  $post_insert_query=mysqli_query($connect,$query);
   confirm($post_insert_query);
  
  $the_post_id= mysqli_insert_id($connect);
  echo "<p class='bg-success'>post Added:" ." ". "<a href='../post.php?p_id=$the_post_id'>View posts </a>or<a href='posts.php?source=add_post'>Add more posts</a>0r <a href='posts.php'>Edit more posts</a></p>";
}
  
?>
 
 <form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name="title">
  </div>
  
<!--
  <div class="form-group">
    <label for="post-category">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div>
-->
 
  <div class="form-group">
    <select name="post_category">
    
    <?php
       $query ="SELECT * FROM categories"; 
             $select_categories=mysqli_query($connect,$query);
            confirm( $select_categories);

            while($row = mysqli_fetch_assoc($select_categories)){ 
            $cat_id=  $row['cat_id'];
            $cat_title= $row['cat_title'];
              echo "<option value='$cat_id'>$cat_title</option>";
            }
    ?>
    </select>
  </div>
  
  
  
  <div class="form-group">
    <label for="Post Author">Post Author</label>
    <input type="text" class="form-control" name="post_author">
  </div>
  
  <div class="form-group">
    <label for="Post Status">Post Status</label>
     <select name="post_status" id="">
       <option value="draft">Select one</option>
       <option value="published">Published</option>
       <option value="draft">Draft</option>

     </select>
    </div>
  
  <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="image">
  </div>
  
  <div class="form-group">
    <label for="title">Post Tag</label>
    <input type="text" class="form-control" name="post_tags">
  </div>
  
  <div class="form-group">
    <label for="post_content">Post Content </label>
   <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
    <input class="btn btn-primary" type="submit"  name="create_post" value="Publish_Post">
  </div>
  
</form>
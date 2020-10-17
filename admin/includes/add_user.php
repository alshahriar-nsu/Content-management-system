<?php
if(isset($_POST['create_user'])){
   //$user_id = $_POST['user_id'];
   $user_firstname= $_POST['user_firstname'];
   $user_lastname= $_POST['user_lastname'];
   $user_role= $_POST['user_role'];
  
   /*$post_image=$_FILES['image']['name']; 
   $post_image_temp=$_FILES['image']['tmp_name'];*/   
  
   $username= $_POST['username'];
   $user_email= $_POST['user_email'];
   $user_password= $_POST['user_password'];
  // $post_date= date('d-m-y');
   //$post_comment_count= 4;
  
  //move_uploaded_file($post_image_temp,"../images/$post_image");
  
 
/*  $query= "INSERT INTO users (user_firstname,user_lastname,user_role,username,user_email,user_password,) Values ('$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";*/
  
  
 $query="INSERT INTO `users` (`username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`,`user_role`) VALUES ('$username', '$user_password', '$user_firstname', '$user_lastname', '$user_email','$user_role')";

 
  $add_user_query=mysqli_query($connect,$query);
   confirm($add_user_query);
  echo "User Created:" ." ". "<a href='users.php'>View User</a>";

}
?>
 
 <form action="" method="post" enctype="multipart/form-data">
   
  <div class="form-group">
    <label for="Post Author">Firstname</label>
    <input type="text" class="form-control" name="user_firstname">
  </div>
  
  <div class="form-group">
    <label for="Post Status">Lastname</label>
    <input type="text" class="form-control" name="user_lastname">
  </div>
  
<!--
  <div class="form-group">
    <label for="post-category">Post Category Id</label>
    <input type="text" class="form-control" name="post_category_id">
  </div>
-->
 
  <div class="form-group">
    <select name="user_role">
           <option value="subscriber">Select option</option>

      <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
    </select>
  </div>
  
 
  
 
<!--  
  <div class="form-group">
    <label for="title">Post Image</label>
    <input type="file" name="image">
  </div>-->
  
  <div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username">
  </div>
  
  <div class="form-group">
    <label for="post_content">Email </label>
    <input type="email" class="form-control" name="user_email">
    </div>
      
  <div class="form-group">
    <label for="post_content">Password </label>
    <input type="password" class="form-control" name="user_password">
    </div>
    
    
    <div class="form-group">
    <input class="btn btn-primary" type="submit"  name="create_user" value="Add_User">
  </div>
  
</form>
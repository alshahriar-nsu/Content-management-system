<?php
 if(isset($_POST['checkBoxArray'])){
   foreach($_POST['checkBoxArray'] as $postValueId){
   $bulk_options = $_POST['bulk_options'];
     switch($bulk_options){
         case'published':
         $query="UPDATE posts SET post_status='$bulk_options' WHERE post_id=$postValueId";
         $update_to_published=mysqli_query($connect,$query);
         confirm($update_to_published);   
         break;
         
         case 'draft':
         $query="UPDATE posts SET post_status='$bulk_options'  WHERE post_id=$postValueId";
         $update_to_draft=mysqli_query($connect,$query);
         confirm($update_to_draft);   
         break;
         
         case'delete':
         $query="DELETE FROM posts WHERE post_id=$postValueId";
         $update_to_delete=mysqli_query($connect,$query);
         confirm($update_to_delete); 
         break;
         
         case'clone':
         
     $query="SELECT * FROM posts WHERE post_id='$postValueId'";
     $select_post_query=mysqli_query($connect,$query);
  while($row = mysqli_fetch_assoc($select_post_query)){ 
   $post_title = $row['post_title'];
   $post_author= $row['post_author'];
   $post_category_id= $row['post_category_id'];
   $post_status= $row['post_status'];
   $post_image=$row['post_image']; 
   $post_tags= $row['post_tags'];
   $post_content= $row['post_content'];
   $post_date= $row['post_date'];
  }
 
  $query= "INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) Values ('$post_category_id','$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status')";
 
  $post_insert_query=mysqli_query($connect,$query);
   confirm($post_insert_query);
          break;
     }
   }
 }
 
?>
      <form action="" method="post">
       <table class="table table-bordered table-hover">
       
       <div id="bulkOptionContainer" class="col-xs-4" >
       
       <select class="form-control" name="bulk_options">
         <option value="">Select Option</option>
         <option value="published">Published</option>
         <option value="draft">Draft</option>
         <option value="delete">Delete</option>
         <option value="clone">Clone</option>
       </select>
       
       </div>
       <div class="col-xs-4">
         <input type="submit" name="submit" class="btn btn-success" value="Apply">
         <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
       </div>
       
       
        <threaad>
        <tr>
        <th><input type="checkbox" id='selectAllBoxes'></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Comments</th>
        <th>Tags</th>
        <th>Comment_Count</th>
        <th>Date</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Post View Count</th>

        </tr>
        </threaad>
        <tbody>

        <?php
        $query ="SELECT * FROM posts ORDER BY post_id DESC";
        $select_posts=mysqli_query($connect,$query);

        while($row = mysqli_fetch_assoc($select_posts)){ 
        $post_id= $row['post_id'];
        $post_author= $row['post_author'];
        $post_title=$row['post_title'];
        $post_category_id= $row['post_category_id'];
        $post_status= $row['post_status'];
        $post_image=$row['post_image']; 
        $post_content=$row['post_content'];
        $post_tags= $row['post_tags'];
        $post_comment_count= $row['post_comment_count'];
        $post_date= $row['post_date'];
        $post_views_count= $row['post_views_count'];
          

        echo"<tr>"; 
          ?>
          
        <td><input type='checkbox' class='checkBoxes' name='checkBoxArray[]' value='<?php echo $post_id; ?>'></td>"
         
          <?php
        echo "<td>{$post_id}</td>";  
        echo "<td>{$post_author}</td>"; 
        echo "<td>{$post_title}</td>"; 
      
        $query ="SELECT * FROM categories WHERE cat_id=$post_category_id "; 
        $select_categories=mysqli_query($connect,$query);

        while($row = mysqli_fetch_assoc($select_categories)){ 
        $cat_id=  $row['cat_id'];
        $cat_title=  $row['cat_title'];
          
        echo "<td>$cat_title</td>";  
      }
         
      //  echo "<td>{$post_category_id}</td>"; 

        echo "<td>{$post_status}</td>";  
        echo "<td><img width='100' src='../images/$post_image' alt='image' </td>"; 
        echo "<td>{$post_content}</td>";
        echo "<td>{$post_tags}</td>";  
        echo "<td>{$post_comment_count}</td>"; 
        echo "<td>{$post_date}</td>";
      echo "<td><a href='../post.php?p_id=$post_id'>View</a></td>";

        echo "<td><a href='posts.php?source=edit_post&p_id=$post_id'>Edit</a></td>";  

        echo "<td><a onClick=\"javascript: return confirm('Are You Sure Want To Delete?'); \" href='posts.php?delete=$post_id'>Delete</a></td>";
          
        echo "<td><a href='posts.php?reset=$post_id'>$post_views_count</td>";

        echo"</tr>";
        }
        
        
        ?>


        </tbody>
        </table>

          </form>
                       <?php
if(isset($_GET['delete'])){
  
  $the_post_id=$_GET['delete'];
  $query= "DELETE from posts where post_id= $the_post_id ";
    $delete_query=mysqli_query($connect,$query);
  confirm($delete_query);
  header("Location: posts.php");
}

if(isset($_GET['reset'])){
  
  $the_post_id=$_GET['reset'];
  $query1= "UPDATE posts SET post_views_count=0 WHERE post_id=$the_post_id";
    $reset_query=mysqli_query($connect,$query1);
  confirm($reset_query);
  header("Location: posts.php");
}

 ?> 
 

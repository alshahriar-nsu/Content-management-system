                         <form action="" method="post">
                            <div class="form-group">
                               <label for="Cat-title">Edit Category Title</label>          
                                  <?php
                               if(isset($_GET['edit'])){
                                $cat_id=$_GET['edit'];
                               $query ="SELECT * FROM categories Where cat_id=$cat_id"; 
                                 $select_categories=mysqli_query($connect,$query);

                                while($row = mysqli_fetch_assoc($select_categories)){ 
                                $cat_id=  $row['cat_id'];
                                $cat_title=  $row['cat_title'];
                                    ?>
                                <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">                                   
                               <?php } } ?>

                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                            </div>
                        </form>
                        
                                          
                                                <!---Update Data-->

                         <?php
                            if(isset($_POST['update'])){
                            $cat_title= $_POST['cat_title'];
                               /* $query="UPDATE categories SET ";
                                $query .="cat_id = '$cat_id', ";
                                $query .="cat_title = '$cat_title' ";
                                $query .=  "WHERE cat_id =$cat_id";*/
                                
                                $query="UPDATE categories SET cat_title = '$cat_title' WHERE cat_id=$cat_id ";
                                
                            $update_data = mysqli_query($connect,$query);
                            if(!$update_data){
                                die( "Query Failed" . mysqli_error($connect));
                            }else{
                                echo"<h1>Data Updated</h1>";
                            }
                        }
                            ?>
<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        
       <?Php include "includes/admin_navigation.php" ?>       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small>AUTHOR</small>
                        </h1>
                        <div class="col-xs-6">
                    <!---INSERT Data-->

                    <?php insert_categories(); ?>
                        
                        <form action="" method="post">
                            <div class="form-group">
                               <label for="Cat-title">Add Category Title</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="add Category">
                            </div>
                        </form>

                      <?php //UPDATE AND iNCLUDE QUERY
                      if(isset($_GET['edit'])){
                      $cat_id=$_GET['edit'];
                          include "includes/update_cat.php";
                      
                      }     
                      ?>
                        
                        </div>
                    
                           <div class="col-xs-6">
                           
           
                           <table class="table table-bordered table-hover">
                               <thread>
                                   <tr>
                                       <td>ID</td>
                                       <td>Category Title</td>
                                       <td>Action</td>
                                       <td>Action</td>
                                   </tr>
                               </thread>
                               <tbody>
                <?Php //FIND ALL CATEGORY QUERY
                                   
                        findALLcategories();
                                   
                 ?>
                                   
               
                                 
            <!--Delete Row  -->    
                 <?php
                 
            delete_category();
                       ?>
                      
                    </tbody>
                           </table>

                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
        
        <!-- /#page-wrapper -->

 
<?php include "includes/admin_footer.php" ?>

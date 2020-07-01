<?php include "includes/admin_header.php"?>
<?php
        if(isset($_SESSION['username']))
       {
            $username=$_SESSION['username'];
            $query="select * from users where username='{$username}' ";
            $select_user_profile_query=mysqli_query($connection,$query);
            if(!$select_user_profile_query)
            {
                die("query failed". mysqli_error($connection));
            }
            while($row = mysqli_fetch_array($select_user_profile_query))
            {
                $user_id=$row['user_id'];
                $username=$row['username'];
                $password=$row['user_password'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                $user_role=$row['user_role'];
                $user_image=$row['user_image'];
                
            }
        }



 ?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>author</small>
                        </h1>
                        
    <form action="" method="post" enctype="multipart/form-data">
   


   <div class="form-group">
       <label for="author">Firstname</label>
       <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
   </div>

   <div class="form-group">
       <label for="post_status">Lastname</label>
       <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
   </div>



      
       <?php


if(isset($_POST['update_profile']))
{

    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $username=$_POST['username'];
    $user_email=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];




    $query="update users set ";
    $query .="user_firstname='{$user_firstname}', ";
    $query .="user_lastname='{$user_lastname}', ";
    $query .="username='{$username}', ";
    $query .="user_email='{$user_email}', ";
    $query .="user_password='{$user_password}' ";
    $query .="where username='{$username}' ";

    $edit_user_query=mysqli_query($connection,$query);
    if(!$edit_user_query)
    {
        die("queryfailed" .mysqli_error($connection));
    }
}




 ?>
       
       


  
   

  

  

   <div class="form-group">
       <label for="post_tags">Username</label>
       <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
   </div>

   <div class="form-group">
       <label for="post_content">Email</label>
       <input type="email" value="<?php echo $user_email; ?>"class="form-control" name="user_email">
       </textarea>
   </div>


   <div class="form-group">
       <label for="post_content">Password</label>
       <input autocomplete="off" type="password"  class="form-control" name="user_password">
       </textarea>
   </div>

   <div class="form-group">
       <input class="btn btn-primary" type="submit" name="update_profile" value="update_profile">
   </div>
   </form>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>



        <!-- /#page-wrapper -->

        <?php include "includes/admin_footer.php"?>


   
<?php
    if(isset($_GET['edit_user']))
    {
       $the_user_id= $_GET['edit_user'];

       $query="select * from users where user_id=$the_user_id ";
        $select_users_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_users_query))
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
 ?>

    

    <?php
    if(isset($_POST['edit_user']))
    {

        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];
        $user_role=$_POST['user_role'];
        $username=$_POST['username'];
       
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];

        if(!empty($user_password))
        {
            $query_password="select user_password from users where user_id=$the_user_id ";
            $get_user=mysqli_query($connection,$query_password);
            if(!$get_user)
            {
                die("query failed".mysqli_error($connection));
            }

            $row=mysqli_fetch_array($get_user);
            $db_user_password=$row['user_password']; 

            if($db_user_password!=$user_password)
        {
            $hashed_password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>12));
        }

        $query="update users set ";
    $query .="user_firstname='{$user_firstname}', ";
    $query .="user_lastname='{$user_lastname}', ";
    $query .="user_role='{$user_role}', ";
    $query .="username='{$username}', ";
    $query .="user_email='{$user_email}', ";
    $query .="user_password='{$hashed_password}' ";
    $query .="where user_id={$the_user_id} ";

    $edit_user_query=mysqli_query($connection,$query);
    if(!$edit_user_query)
    {
        die("queryfailed" .mysqli_error($connection));
    }
    echo "Users Updated" . " " . "<a href='users.php'>View Users?</a>";

   }

    
    
    }
}else
{
    header("Location: index.php");
}

?>





<form action="" method="post" enctype="multipart/form-data">
   


    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
    </div>


    <div class="form-group">
    <select name="user_role" id="">
    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
        <?php
            if($user_role=='admin')
            {
                echo "<option value='subscriber'>subscriber</option>";
            }
            else
            {
               echo "<option value='admin'>admin</option>";
            }
        ?>
        
        
        


   
    </select>
    </div>

   

   

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
        <input autocomplete="off" type="password" value="<?php echo $password; ?>" class="form-control" name="user_password">
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update_user">
    </div>
    </form>
 

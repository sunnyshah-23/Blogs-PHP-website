<?php
    if(isset($_POST['create_user']))
    {
        
        $user_firstname=escape($_POST['user_firstname']);
        $user_lastname=escape($_POST['user_lastname']);
        $user_role=$_POST['user_role'];

       
        $username=escape($_POST['username']);
        $user_email=escape($_POST['user_email']);
        $user_password=escape($_POST['user_password']);
        $password=password_hash($user_password,PASSWORD_BCRYPT,array('cost'=>10));
      
      

       

        $query="insert into users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";

        $query .="values ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$password}') ";

        $create_user_query=mysqli_query($connection,$query);
        
        if(!$create_user_query)
        {
            die("query failed". mysqli_error($connection));
        }

        echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";
        

    }
    



?>





<form action="" method="post" enctype="multipart/form-data">
   


    <div class="form-group">
        <label for="author">Firstname</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>


    <div class="form-group">
    <select name="user_role" id="">
        <option value="subscriber">Select Options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>


   
    </select>
    </div>

   

   

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_content">Email</label>
        <input type="email" class="form-control" name="user_email">
        </textarea>
    </div>


    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="password" class="form-control" name="user_password">
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add_user">
    </div>
    </form>
 

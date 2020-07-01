<?php

if(isset($_GET['p_id']))
{

    $the_post_id= escape($_GET['p_id']);
}
$query="select * from posts where post_id=$the_post_id ";
$select_posts_by_id=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_posts_by_id))
{
 $posts_id=$row['post_id'];
 $post_user=$row['post_user'];
 $post_title=$row['post_title'];
 $post_category_id=$row['post_category_id'];
 $post_status=$row['post_status'];
 $post_image=$row['post_image'];
 $posts_tags=$row['post_tags'];
 $comment_count=$row['post_comment_count'];
 $post_content=$row['post_content'];
$post_date=$row['post_date'];
}

if(isset($_POST['update_post']))
{
    
    $post_user=escape($_POST['post_user']);
    $post_title=escape($_POST['post_title']);
    $post_category_id=escape($_POST['post_category']);
    $post_status=escape($_POST['post_status']);
    $post_image= escape($_FILES['image']['name']);
    $post_image_temp= escape($_FILES['image']['tmp_name']);
    $posts_tags=escape($_POST['post_tags']);
    
    $post_content=$_POST['post_content'];
    move_uploaded_file($post_image_temp, "../images/$post_image");

    if(empty($post_image))
    {
        $query="select *from posts where post_id=$the_post_id";
        $select_image=mysqli_query($connection,$query);
        while($row=mysqli_fetch_assoc($select_image))
        {
            $post_image=$row['post_image'];
        }
    }



    $query="update posts set ";
    $query .="post_title='{$post_title}', ";
    $query .="post_category_id='{$post_category_id}', ";
    $query .="post_date=now(), ";
    $query .="post_user='{$post_user}', ";
    $query .="post_status='{$post_status}', ";
    $query .="post_tags='{$posts_tags}', ";
    $query .="post_content='{$post_content}', ";
    $query .="post_image='{$post_image}' ";
    $query .="where post_id={$the_post_id} ";

    $update_posts=mysqli_query($connection,$query);
    if(!$update_posts)
    {
        die("query failed" .mysqli_error($connection));
    }
    echo "<p class='bg bg-success'>Post updated. <a href='../post.php?p_id={$the_post_id}'>View Post</a> or <a href='posts.php'>Edit more posts</p>" ;
  
}

?>





<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title;?>" class="form-control" name="post_title">
    </div>

    <div class="form-group">
    <label for="categories">Categories</label>
    <select name="post_category" id="post_category">
        <?php

            $query = "select * from categories";
            $select_categories = mysqli_query($connection, $query);
            if(!$select_categories)
            {
                die("query failed".mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            

        ?>
        </select>
    </div>
    <div class="form-group">
    <label for="users">Users</label>
    <select name="post_user" id="post_category">
    <?php echo "<option value='{$post_user}'>{$post_user}</option>"; ?>
        <?php

            $query = "select * from users";
            $select_users = mysqli_query($connection, $query);
            if(!$select_users)
            {
                die("query failed".mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                echo "<option value='{$username}'>{$username}</option>";
            }

            

        ?>
        </select>
    </div>

    <!--<div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" value="<?php //echo $post_author;?>" class="form-control" name="post_author">
    </div>            -->
    <div class="form-group">
    <select name="post_status" id="">
            <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
        <?php
             if($post_status=='published')
             {
                 echo "<option value='draft'>Draft</option>";
             }
             else
             {
                echo "<option value='published'>Published</option>";
             }

        ?>
    </select>
    </div>
<!--
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" value="<?php echo $post_status;?>" class="form-control" name="post_status">
    </div>
-->
    <div class="form-group">
        
        <img  src="../images/<?php echo $post_image;?>" width="100" alt="" >
        <input type="file"  name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text"  value="<?php echo $posts_tags;?>" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control"  name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?>;
        </textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update_post">
    </div>
    </form>
 

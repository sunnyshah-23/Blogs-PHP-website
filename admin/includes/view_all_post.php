<?php include "delete_modal.php" ?>;
<?php
    if(isset($_POST['checkBoxArray']))
    {
        foreach($_POST['checkBoxArray'] as $post_ValueId)
        {
           $bulk_options=$_POST['bulk_options'];
           switch($bulk_options)
           {
               case 'published':
                    $query="update posts set post_status='{$bulk_options}' where post_id={$post_ValueId} ";
                    $update_to_published_status=mysqli_query($connection,$query);
                    if(!$update_to_published_status)
                    {
                        die("query failed".mysqli_error($connection));
                    }
               break;

               case 'draft':
                $query="update posts set post_status='{$bulk_options}' where post_id={$post_ValueId} ";
                $update_to_draft_status=mysqli_query($connection,$query);
                if(!$update_to_draft_status)
                {
                    die("query failed".mysqli_error($connection));
                }
           break;

           case 'delete':
            $query="delete  from posts where post_id={$post_ValueId} ";
            $update_to_delete_status=mysqli_query($connection,$query);
            if(!$update_to_delete_status)
            {
                die("query failed".mysqli_error($connection));
            }
       break;

            case 'clone':
                $query="select *from posts where post_id='{$post_ValueId}' ";
                $select_post_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array($select_post_query))
                {
                    $post_title=$row['post_title'];
                    $post_category_id=$row['post_category_id'];
                    $post_date=$row['post_date'];
                    $post_author=$row['post_author'];
                    $post_status=$row['post_status'];
                    $post_image=$row['post_image'];
                    $post_tags=$row['post_tags'];
                    $post_content=$row['post_content'];
                }
                $query="insert into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status) ";
                $query .="values({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{ $post_content}','{$post_tags}','{$post_status}') ";
                
                $copy_query=mysqli_query($connection,$query);
                if(!$copy_query)
                {
                    die("Query Failed". mysqli_error($connection));
                }
            break;



           }
        }
    }
?>

<form action="" method='post'>
<div class="table-resposive">
<table class="table table-bordered table-hover">
    <div id="bulkOptionsContainer" class="col-xs-4">
        <select class="form-control" name="bulk_options" id="">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>
        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply"> &nbsp;<a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
    </div>
                        <thead>
                            <tr>
                                 <th><input id="selectAllBoxes" type="checkbox"></th>
                                 <th>Post id</th>
                                 <th>Users</th>
                                 <th>Title</th>
                                 <th>Category</th>
                                 <th>Status</th>
                                 <th>Image</th>
                                 <th>Tags</th>
                                 <th>Comments</th>
                                 <th>Date</th>
                                 <th>View Post</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                                 <th>Post Views</th>
                            </tr>
                       </thead>
                            <tbody>
                            <?php
                                    $query="select * from posts order by post_id DESC";
                                    $select_posts=mysqli_query($connection,$query);
                                    while($row=mysqli_fetch_assoc($select_posts))
                                 {
                                     $posts_id=$row['post_id'];
                                     $post_author=$row['post_author'];
                                     $post_user=$row['post_user'];
                                     $post_title=$row['post_title'];
                                     $post_category_id=$row['post_category_id'];
                                     $post_status=$row['post_status'];
                                     $post_image=$row['post_image'];
                                     $posts_tags=$row['post_tags'];
                                     $comment_count=$row['post_comment_count'];
                                    $post_date=$row['post_date'];
                                    $post_views_count=$row['post_views_count'];

                                     echo "<tr>";
                            ?>
                                     <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $posts_id; ?>'></td>
                                     <?php
                                     echo "<td>{$posts_id}</td>";
                                     if(isset($post_author) && !empty($post_author))
                                    {
                                        echo "<td>{$post_author}</td>";
                                    }
                                    elseif(isset($post_user) && !empty($post_user))
                                    
                                    {
                                        echo "<td>{$post_user}</td>";
                                    }
                                                                        
                                     echo "<td>{$post_title}</td>";
                                    
                                     $query = "select * from categories where cat_id= {$post_category_id}";
                                    $select_categories_id = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_title'];
                                    
                                    
                                    
                                     echo "<td>{$cat_title}</td>";
                                    }
                                     echo "<td>{$post_status}</td>";
                                     echo "<td><img width='100' src='../images/$post_image'</td>";
                                     echo "<td>{$posts_tags}</td>";
                                   // $query="select * from comments where comment_post_id=$posts_id ";
                                   // $send_comment_query=mysqli_query($connection,$query);
                                   // $row=mysqli_fetch_array($send_comment_query);
                                   // $comment_id= $row['comment_id'];
                                  //  $count_comments=mysqli_num_rows($send_comment_query);


                                     echo "<td>{$comment_count}</td>";



                                     echo "<td>{$post_date}</td>";
                                     echo "<td><a href='../post.php?p_id={$posts_id}'>View Post</a></td>";
                                     echo "<td><a href='posts.php?source=edit_post&p_id={$posts_id}'>Edit</a></td>";
                                     echo "<td><a onlcik=\"javascript:return cofirm('Are you sure you want to delete'); \" href='posts.php?delete={$posts_id}'>Delete</a></td> ";

                                     echo "<td><a href='posts.php?reset={$posts_id}'>{$post_views_count}</a></td>";
                                     
                                     
                                     echo "</tr>";
                                 }
                                 ?>
                                
                            </tbody>
                        <table>
                        </div>
                        </form>
                        <?php

                            if(isset($_GET['delete']))
                            {
                                $the_post_id=$_GET['delete'];
                                $query="delete from posts where post_id={$the_post_id}";
                                $delete_post=mysqli_query($connection,$query);
                                header("Location: posts.php");

                                if(!$delete_post)
                                {
                                    die("query failed").mysqli_error($connection);
                                }
                            }

                            if(isset($_GET['reset']))
                            {
                                $the_post_id=$_GET['reset'];
                                $query="update posts set post_views_count = 0 where post_id=" .mysqli_real_escape_string($connection,$_GET['reset']) . " " ;
                                $reset_query=mysqli_query($connection,$query);
                                header("Location: posts.php");

                            }




                        ?>
 


<?php include "include/header.php";?>
<?php include "include/db.php";?>


    <!-- Navigation -->
    <?php include "include/navigation.php";?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                 <?php
               
               $per_page=3;
                    if(isset($_GET['page']))
                   {
                        $page=$_GET['page'];

                    }
                    else{
                        $page="";
                    }
                    if($page=='' || $page==1)
                    {
                        $page_1=0;
                    }
                    else
                    {
                        $page_1=($page*$per_page)-$per_page;
                    }
                
                    $post_query_count="select * from posts ";
                    $find_count=mysqli_query($connection,$post_query_count);
                   $count=mysqli_num_rows($find_count);
                    $count=ceil($count/$per_page);

                    
                    $query="select * from posts limit $page_1,$per_page ";
                    $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_user'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=substr($row['post_content'],0,100);
                        

                        

                        
                       ?>
                        
                      
                     
                    <!-- First Blog Post -->
                    <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title?>  </a>
                    </h2>
                    <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                    </a>
                    <hr>
                    <p><?php echo $post_content;?></p>
                    <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>


                        
                    <?php }  ?>




                
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php";?>
            
        </div>
        <!-- /.row -->

        <hr>

        <ul class="pager">
          <?php
                for($i=1;$i<=$count;$i++)
                {
                    if($i==$page)
                    {
                        echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";    
                    }
                    else{
                    echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                    }
                }
            ?>
            </ul>
            
            
       
        <?php include "include/footer.php";?>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Blogs 2020</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
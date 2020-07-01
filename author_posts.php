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

                    if(isset($_GET['p_id']))
                    {
                        $the_post_id=$_GET['p_id'];
                        $the_post_author=$_GET['author'];

                    }
                    $query="select * from posts where post_user='{$the_post_author}' ";
                    $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                        $post_author=$row['post_user'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                       ?>


                    
                    <!-- First Blog Post -->
                    <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title?>  </a>
                    </h2>
                    <p class="lead">
                    All Posts By <?php echo $post_author; ?>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                    

                    <hr>


                        
                    <?php } ?>


            <!-- Comments Form -->

           
                    
                 







                  
                <!-- Posted Comments -->

                <!-- Comment -->
               

                
                
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "include/sidebar.php";?>
            
        </div>
        <!-- /.row -->

        <hr>
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
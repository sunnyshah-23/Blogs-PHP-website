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


                if(isset($_POST['submit']))
                {
                    $search=$_POST['search'];
                            
                $query="select * from posts where post_tags like '%$search%' ";
                $search_query=mysqli_query($connection,$query);
                if(!$search_query)
                {
                die("Query Failed").mysqli_error($connection);
                }

                $count=mysqli_num_rows($search_query);
                if($count==0){
                echo "<h1> NO RESULT</h1>";
                }
                else
                {
                   
                    while($row=mysqli_fetch_assoc($search_query))
                    {
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
                    by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                    <hr>
                    <p><?php echo $post_content; ?></p>
                  

                    <hr>


                        
                    <?php }
                }
                }?>







                
                
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
                    <p>Copyright &copy; Your Website 2020</p>
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
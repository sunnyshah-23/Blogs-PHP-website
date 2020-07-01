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
                    $query="select * from posts";
                    $select_all_posts_query=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($select_all_posts_query))
                    {
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_image=$row['post_image'];
                        $post_content=$row['post_content'];
                       ?>


                     <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                    </h1>
                    <!-- First Blog Post -->
                    <h2>
                    <a href="#"><?php echo $post_title?>  </a>
                    </h2>
                    <p class="lead">
                    by <a href="index.php">Start Bootstrap</a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>


                        
                    <?php } ?>




                
                
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
                    <p>Copyright &copy; Your Website 2014</p>
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
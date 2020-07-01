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
                    by <a href="index.php"><?php echo $post_author?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date?></p>
                    <hr>
                    <img class="img-responsive" src="http://placehold.it/900x300" alt="">
                    <hr>
                    <p><?php echo $post_content?></p>
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
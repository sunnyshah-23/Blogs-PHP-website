<div class="col-md-4">
    <?php include "db.php";?>
                


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                    </form><!-- /.form-search -->
                </div>


                 <!-- Blog Search Well -->
                 <div class="resp">
                 <div class="well">
                    <?php if (isset($_SESSION['user_role'])): ?>
                        <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>
                        <a href="include/logout.php" class="btn btn-primary">Logout</a>
                    <?php else: ?>
                        <h4>Login</h4>
                    <form action="include/login.php" method="post">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                        
                    </div>

                    <div class="input-group">
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit
                            </button>
                        </span>
                        
                    </div>
                    <!-- /.input-group -->
                    </form><!-- /.form-search -->
                    <?php endif; ?>
                    


                </div>
                </div>






                <!-- Blog Categories Well -->
                <div class="well">

                    <?php
                    $query="select * from categories";
                    $select_all_categories_sidebar=mysqli_query($connection,$query);
            
                    ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                 <?php
                                 
                                 while($row=mysqli_fetch_assoc($select_all_categories_sidebar))
                                 {
                                     $cat_title=$row['cat_title'];
                                     $cat_id=$row['cat_id'];
                                     echo "<li><a href='categories.php?category=$cat_id'>{$cat_title}</a></li>";
                                     
                                 }
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                ?>


                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               
            </div>

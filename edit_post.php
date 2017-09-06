<?php
include './template/home/home_header.php';
?>
                        <!-- post section on timeline-->
                        <div class="col-lg-6">
                            <?php 
                            if(isset($_GET['post_id']))
                            {
                                $get_id=$_GET['post_id'];
                                
                                $get_post="select * from posts where post_id='$get_id'";
                                $run_post= mysqli_query($con, $get_post);
                                $row= mysqli_fetch_array($run_post);
                                
                                $post_titile=$row['post_titile'];
                                $post_con=$row['post_content'];
                            }
                            ?>
                            <form method="post" class="form-group" action="" required >
                                <div class="form-group"> 
                                    <h2  class="form-control" >
                                       Update your post !
                                    </h2>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="titile" value="<?php echo $post_titile;?>" required/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content"  
                                              style="height: 300px; text-align: justify" required><?php echo $post_con;?></textarea>


                                </div>
                                <div class="form-group form-inline">
                                    <center> 
                                        <div class="form-group">
                                            <select class="form-control"name="topic" style="width: 200px"required>
                                                <option  selected="selected"> Select Topic : </option>
    <?php gets_topic(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" style="width: 200px" name="update" value="update post"/>
                                        </div>
                                    </center>
                                </div>
                            </form> 
                            <?php    
      if(isset($_POST['update'])){
    
       $titile=$_POST['titile'];
       $content=$_POST['content'];
       $topic=$_POST['topic'];
    
    $update_post="update posts set post_titile='$titile',post_content='$content',topic_id='$topic' where post_id='$get_id'";
    $run_update= mysqli_query($con, $update_post);
    if($run_update){
        
        echo "<script>alert('A post has been updated!');</script>";
        echo "<script>window.open('home.php','_self')</script>";

    }
}?>

                        </div>
                        <!-- post section on timeline end-->

                        <!--user details-->
                        <h2>Member...</h2>
                        <div  id="user datils" class="col-lg-3"style='height:500px; overflow-y: scroll' >
                            
                             <?php member();?>
                        </div>
                        <!--user details end-->
                    </div>
                    <!--row end-->
                </div>
                <!--container end-->

                <!-- timeline  -->
               
    
                                </section>
            <!-- user timeline end-->

<?php
include './template/home/home_footer.php';
?>
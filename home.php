<?php
include './template/home/home_header.php';
?>
                        <!-- post section on timeline-->
                        <div class="col-lg-6">
                            <form method="post" class="form-group"action="home.php?id=<?php echo $user_id; ?>" required >
                                <div class="form-group"> 
                                    <h2>
                                        What's your question today ? let's discuss !
                                    </h2>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="title" placeholder="wirte a title here..." required/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="content" placeholder="Any particular interests?" 
                                              style="height: 300px; text-align: justify" required></textarea>


                                </div>
                                <div class="form-group form-inline">
                                    <center> 
                                        <div class="form-group">
                                            <select class="form-control" name="topic" style="width: 200px"required>
                                                <option  selected="selected" > Select Topic : </option>
    <?php gets_topic(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="form-control btn-success" style="width: 200px"name="sub" value="Post to Timeline"/>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                        <!-- post section on timeline end-->

                        <!--user details-->
                        <h2>Member...</h2>
                        <div  id="user datils" class="col-lg-3" style='height:500px; overflow-y: scroll ' >
                            
                             <?php member();?>
                        </div>
                        <!--user details end-->
                    </div>
                    <!--row end-->
                    <a class="btn btn-default btn-lg page-scroll " id="timeline_button"href="#posts"> Timeline  <span class=" glyphicon glyphicon-chevron-down"></s0an></a>
                </div>
                <!--container end-->

                <!-- timeline  -->
                <section>
    <?php insert_post(); ?>
                    <div class = 'container'id="posts">
                        <div class = 'row' style="padding-top: 150px">
                            <h2>Time Line...</h2>

    <?php get_posts(); ?>

                        </div>
                    </div>
                </section>
                <!-- user timeline end -->
            </section>
            <!-- user timeline end-->

<?php
include './template/home/home_footer.php';
?>
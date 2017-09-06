<?php
include './template/home/home_header.php';
?>
                        <!-- post section on timeline-->
                        <div class="col-lg-6">
                            <section>
                                
                                <div class='form-group'> 
                                    <h2 >
                                        Comment It ...
                                    </h2>
                                </div>
                                <?php single_post();?></section>
                           
                            
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

                <!-- user timeline end -->
            </section>
            <!-- user timeline end-->

<?php
include './template/home/home_footer.php';
?>
<?php
include './template/home/home_header.php';
?>
<!-- post section on timeline-->
                        <div class="col-lg-6">
                                <div class="form-group"> 
                                    <h2  >
                                        Info of this user...
                                    </h2>
                                </div>
                            <div id="user_profile">
                                <?php
                                  
                                user_profile();

                                ?>
                                
                            </div>
                        </div>
                        <!-- post section on timeline end-->

                        <!--user details-->
                        <h2>Member...</h2>
                        <div  id="user datils" class="col-lg-3" style='height:500px; overflow-y: scroll'>
                            
                             <?php member();?>
                        </div>
                        <!--user details end-->
                    </div>
                    <!--row end-->
                    
                </div>
                <!--container end-->

            </section>
            <!-- user timeline end-->

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

            <!-- Scrolling Nav JavaScript -->
            <script src="js/jquery.easing.min.js"></script>
            <script src="js/scrolling-nav.js"></script>

        </body>

    </html>
  
<?php
include './template/home/home_header.php';
?>
                        <!-- post section on timeline-->
                        <h2>Member...</h2>
                        <div class="col-lg-9" style='height:500px; overflow-y: scroll'>
                            
                            <?php member();?>
                        </div>
                        <!-- post section on timeline end-->
                        
                        <!--user details-->
                        <div class="col-lg-3">
                        
                       </div>
                       <!--user details end-->
                    </div>
                    <!--row end-->

                </div>
                <!--container end-->

            </section>
            <!-- user timeline end-->

<?php
include './template/home/home_footer.php';
?>
<div class='well'>
    <h2><center> View_users...</center></h2>
    <!-- table for the view user-->
    <table class='table table-hover '>
        <tr class='active' style="">
            <td><b>S.N.</b></td>
            <td><b>Name</b></td>
            <td><B>Email</B></td>
            <td><B>Image</B></td>
            <td><B>Country</B></td>
            <td><B>Gender</B></td>
            <td><B>Birthday</B></td>
            <td><B>Register_date</B></td>
            <td><B>Delete</B></td>
            <td><B>Edit</B></td>
        </tr> 
        <?php
        include '../includes/connection.php';
       
         $get_user = "select * from users order by 1 DESC";
         $run = mysqli_query($con, $get_user);
         $i=0;
        while($row_user=mysqli_fetch_array($run)){
            
    $user_id = $row_user['user_id'];
    $user_name = $row_user['user_name'];
    $user_email = $row_user['user_email'];
    $user_country = $row_user['user_country'];
    $user_birthday = $row_user['user_b_day'];
    $user_gender = $row_user['user_gender'];
    $user_image = $row_user['user_image'];
    $register_date = $row_user['register_date'];
    $i++;
          ?>
        <tr>
            <td><?PHP echo $i;?></td>
            <td><?PHP echo $user_name;?></td>
            <td><?PHP echo $user_email;?></td>
            <td><img class="img-circle"src="../user/user_images/<?PHP echo $user_image;?>" width='50' height='50'/></td>
            <td><?PHP echo $user_country;?></td>
            <td><?PHP echo $user_gender;?></td>
            <td><?PHP echo $user_birthday;?></td>
            <td><?PHP echo $register_date;?></td>
            <td><a class="btn-danger form-control"href="delete_user.php?delete=<?php echo $user_id;?>"><center>Delete</center></a></td>
            <td><a class="btn-primary form-control" href="index.php?view_users&edit=<?php echo $user_id;?>"><center>Edit</center></a></td>
        </tr> 
<?PHP } ?>  
    </table> 
    

    
    
 <?PHP 
        include '../includes/connection.php';
       if(isset($_GET['edit'])){
           
           $edit_id=$_GET['edit'];
  
         $get_user = "select * from users where user_id='$edit_id'";
         $run = mysqli_query($con, $get_user);
         
        $row_user=mysqli_fetch_array($run);
            
    $user_id = $row_user['user_id'];
    $user_name = $row_user['user_name'];
    $user_pass=$row_user['user_pass'];
    $user_email = $row_user['user_email'];
    $user_birthday = $row_user['user_b_day'];
    $user_country = $row_user['user_country'];
    $user_gender = $row_user['user_gender'];
    $user_image = $row_user['user_image'];
    $registerdate = $row_user['register_date'];
       
 ?>
                         <!-- post section on timeline-->
                        <div class="col-lg-10">
                          
                                <div class="form-group"> 
                                    <h2  >
                                       Edit your profile... 
                                    </h2>
                                    <form action="" method="post" enctype="multipart/form-data">

                            <!-- start name -->
                            <div class="form-group  row ">
                                <label for="uname" class="col-sm-3 col-form-label"><span class=" glyphicon glyphicon-user"></span> Name  </label>
                                <div class="col-sm-9">
                                    <input type="text" name="u_name" class="form-control"  value="<?php echo $user_name;?>">
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end name -->

                            <!-- start password -->
                            <div class="form-group row">
                                <label for="uPass" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-share-alt"></span>  Password</label>
                                <div class="col-lg-9">
                                    <input type="password" name="u_pass" class="form-control"  value="<?php echo $user_pass;?>" >
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end password -->

                            <!-- start email -->
                            <div class="form-group row">

                                <label for="uemail" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-share-alt"></span>   Email  </label>
                                <div class="col-lg-9">
                                    <input type="email" name="u_email" class="form-control"  value="<?php echo $user_email;?>" >
                                    <small class="text-muted"></small>
                                </div></div>

                            <!-- /end email -->

                            <!-- start birthday -->
                            <div class="form-group row">
                                <label for="ubirthday" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-calendar"></span>  Birthday</label>
                                <div class="col-lg-9">
                                    <input type="date" name="u_birthday" class="form-control" value="<?php echo $user_birthday;?>">
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end birthday -->


                            <!-- start gender -->
                            <div class="form-group  row ">
                                <label for="ugender" class="col-sm-3 col-form-label"> <span class=" glyphicon glyphicon-list"></span> Gender </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="u_gender" >
                                        <option value="male" selected="selected"> <?php echo $user_gender;?></option>
                                        <option value="male" > Male </option>
                                        <option value="female"> Female </option>
                                    </select>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end gender -->
                            
                            <!-- start image -->
                            <div class="form-group row">
                                <label for="uregister" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-picture"></span>  Register_date</label>
                                <div class="col-lg-9">
                                    <input type="date" name="u_registerdate" value="<?php echo $registerdate;?>" class="form-control" >
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end image -->
                            
                             <!-- start country -->
                            <div class="form-group row">
                                <label for="ucountry" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-list"></span>  country</label>
                                <div class="col-lg-9">
                                    <select  class="form-control" name="u_country" required>
                                                            <option ><?php echo $user_country;?></option>
                                                            <option >Afghanistan</option>
                                                            <option >Åland Islands</option>
                                                            <option >Albania</option>
                                                            <option >Algeria</option>
                                                            <option >American Samoa</option>
                                                            <option >Andorra</option>
                                                            <option >Angola</option>
                                                            <option >Anguilla</option>
                                                            <option >Antarctica</option>
                                                            <option >Antigua and Barbuda</option>
                                                            <option >Argentina</option>
                                                            <option >Armenia</option>
                                                            <option >Aruba</option>
                                                            <option >Australia</option>
                                                            <option >Austria</option>
                                                            <option >Azerbaijan</option>
                                                            <option >Bahamas</option>
                                                            <option >Bahrain</option>
                                                            <option >Bangladesh</option>
                                                            <option >Barbados</option>
                                                            <option >Belarus</option>
                                                            <option >Belgium</option>
                                                            <option >Belize</option>
                                                            <option >Benin</option>
                                                            <option >Bermuda</option>
                                                            <option >Bhutan</option>
                                                            <option >Bolivia, Plurinational State of</option>
                                                            <option >Bonaire, Sint Eustatius and Saba</option>
                                                            <option >Bosnia and Herzegovina</option>
                                                            <option >Botswana</option>
                                                            <option >Bouvet Island</option>
                                                            <option >Brazil</option>
                                                            <option >British Indian Ocean Territory</option>
                                                            <option >Brunei Darussalam</option>
                                                            <option >Bulgaria</option>
                                                            <option >Burkina Faso</option>
                                                            <option >Burundi</option>
                                                            <option >Cambodia</option>
                                                            <option >Cameroon</option>
                                                            <option >Canada</option>
                                                            <option >Cape Verde</option>
                                                            <option >Cayman Islands</option>
                                                            <option >Central African Republic</option>
                                                            <option >Chad</option>
                                                            <option >Chile</option>
                                                            <option >China</option>
                                                            <option >Christmas Island</option>
                                                            <option >Cocos (Keeling) Islands</option>
                                                            <option >Colombia</option>
                                                            <option >Comoros</option>
                                                            <option >Congo</option>
                                                            <option >Congo, the Democratic Republic of the</option>
                                                            <option >Cook Islands</option>
                                                            <option >Costa Rica</option>
                                                            <option >Côte d'Ivoire</option>
                                                            <option >Croatia</option>
                                                            <option >Cuba</option>
                                                            <option >Curaçao</option>
                                                            <option >Cyprus</option>
                                                            <option >Czech Republic</option>
                                                            <option >Denmark</option>
                                                            <option >Djibouti</option>
                                                            <option >Dominica</option>
                                                            <option >Dominican Republic</option>
                                                            <option >Ecuador</option>
                                                            <option >Egypt</option>
                                                            <option >El Salvador</option>
                                                            <option >Equatorial Guinea</option>
                                                            <option >Eritrea</option>
                                                            <option >Estonia</option>
                                                            <option >Ethiopia</option>
                                                            <option >Falkland Islands (Malvinas)</option>
                                                            <option >Faroe Islands</option>
                                                            <option >Fiji</option>
                                                            <option >Finland</option>
                                                            <option >France</option>
                                                            <option >French Guiana</option>
                                                            <option >French Polynesia</option>
                                                            <option >French Southern Territories</option>
                                                            <option >Gabon</option>
                                                            <option >Gambia</option>
                                                            <option >Georgia</option>
                                                            <option >Germany</option>
                                                            <option >Ghana</option>
                                                            <option >Gibraltar</option>
                                                            <option >Greece</option>
                                                            <option >Greenland</option>
                                                            <option >Grenada</option>
                                                            <option >Guadeloupe</option>
                                                            <option >Guam</option>
                                                            <option >Guatemala</option>
                                                            <option >Guernsey</option>
                                                            <option >Guinea</option>
                                                            <option >Guinea-Bissau</option>
                                                            <option >Guyana</option>
                                                            <option >Haiti</option>
                                                            <option >Heard Island and McDonald Islands</option>
                                                            <option >Holy See (Vatican City State)</option>
                                                            <option >Honduras</option>
                                                            <option >Hong Kong</option>
                                                            <option >Hungary</option>
                                                            <option >Iceland</option>
                                                            <option >India</option>
                                                            <option >Indonesia</option>
                                                            <option >Iran, Islamic Republic of</option>
                                                            <option >Iraq</option>
                                                            <option >Ireland</option>
                                                            <option >Isle of Man</option>
                                                            <option >Israel</option>
                                                            <option >Italy</option>
                                                            <option >Jamaica</option>
                                                            <option >Japan</option>
                                                            <option >Jersey</option>
                                                            <option >Jordan</option>
                                                            <option >Kazakhstan</option>
                                                            <option >Kenya</option>
                                                            <option >Kiribati</option>
                                                            <option >Korea, Democratic People's Republic of</option>
                                                            <option >Korea, Republic of</option>
                                                            <option >Kuwait</option>
                                                            <option >Kyrgyzstan</option>
                                                            <option >Lao People's Democratic Republic</option>
                                                            <option >Latvia</option>
                                                            <option >Lebanon</option>
                                                            <option >Lesotho</option>
                                                            <option >Liberia</option>
                                                            <option >Libya</option>
                                                            <option >Liechtenstein</option>
                                                            <option >Lithuania</option>
                                                            <option >Luxembourg</option>
                                                            <option >Macao</option>
                                                            <option >Macedonia, the former Yugoslav Republic of</option>
                                                            <option >Madagascar</option>
                                                            <option >Malawi</option>
                                                            <option >Malaysia</option>
                                                            <option >Maldives</option>
                                                            <option >Mali</option>
                                                            <option >Malta</option>
                                                            <option >Marshall Islands</option>
                                                            <option >Martinique</option>
                                                            <option >Mauritania</option>
                                                            <option >Mauritius</option>
                                                            <option >Mayotte</option>
                                                            <option >Mexico</option>
                                                            <option >Micronesia, Federated States of</option>
                                                            <option >Moldova, Republic of</option>
                                                            <option >Monaco</option>
                                                            <option >Mongolia</option>
                                                            <option >Montenegro</option>
                                                            <option >Montserrat</option>
                                                            <option >Morocco</option>
                                                            <option >Mozambique</option>
                                                            <option >Myanmar</option>
                                                            <option >Namibia</option>
                                                            <option >Nauru</option>
                                                            <option >Nepal</option>
                                                            <option >Netherlands</option>
                                                            <option >New Caledonia</option>
                                                            <option >New Zealand</option>
                                                            <option >Nicaragua</option>
                                                            <option >Niger</option>
                                                            <option >Nigeria</option>
                                                            <option >Niue</option>
                                                            <option >Norfolk Island</option>
                                                            <option >Northern Mariana Islands</option>
                                                            <option >Norway</option>
                                                            <option >Oman</option>
                                                            <option >Pakistan</option>
                                                            <option >Palau</option>
                                                            <option >Palestinian Territory, Occupied</option>
                                                            <option >Panama</option>
                                                            <option >Papua New Guinea</option>
                                                            <option >Paraguay</option>
                                                            <option >Peru</option>
                                                            <option >Philippines</option>
                                                            <option >Pitcairn</option>
                                                            <option >Poland</option>
                                                            <option >Portugal</option>
                                                            <option >Puerto Rico</option>
                                                            <option >Qatar</option>
                                                            <option >Réunion</option>
                                                            <option >Romania</option>
                                                            <option >Russian Federation</option>
                                                            <option >Rwanda</option>
                                                            <option >Saint Barthélemy</option>
                                                            <option >Saint Helena, Ascension and Tristan da Cunha</option>
                                                            <option >Saint Kitts and Nevis</option>
                                                            <option >Saint Lucia</option>
                                                            <option >Saint Martin (French part)</option>
                                                            <option >Saint Pierre and Miquelon</option>
                                                            <option >Saint Vincent and the Grenadines</option>
                                                            <option >Samoa</option>
                                                            <option >San Marino</option>
                                                            <option >Sao Tome and Principe</option>
                                                            <option >Saudi Arabia</option>
                                                            <option >Senegal</option>
                                                            <option >Serbia</option>
                                                            <option >Seychelles</option>
                                                            <option >Sierra Leone</option>
                                                            <option >Singapore</option>
                                                            <option >Sint Maarten (Dutch part)</option>
                                                            <option >Slovakia</option>
                                                            <option >Slovenia</option>
                                                            <option >Solomon Islands</option>
                                                            <option >Somalia</option>
                                                            <option >South Africa</option>
                                                            <option >South Georgia and the South Sandwich Islands</option>
                                                            <option >South Sudan</option>
                                                            <option >Spain</option>
                                                            <option >Sri Lanka</option>
                                                            <option >Sudan</option>
                                                            <option >Suriname</option>
                                                            <option >Svalbard and Jan Mayen</option>
                                                            <option >Swaziland</option>
                                                            <option >Sweden</option>
                                                            <option >Switzerland</option>
                                                            <option >Syrian Arab Republic</option>
                                                            <option >Taiwan, Province of China</option>
                                                            <option >Tajikistan</option>
                                                            <option >Tanzania, United Republic of</option>
                                                            <option >Thailand</option>
                                                            <option >Timor-Leste</option>
                                                            <option >Togo</option>
                                                            <option >Tokelau</option>
                                                            <option >Tonga</option>
                                                            <option >Trinidad and Tobago</option>
                                                            <option >Tunisia</option>
                                                            <option >Turkey</option>
                                                            <option >Turkmenistan</option>
                                                            <option >Turks and Caicos Islands</option>
                                                            <option >Tuvalu</option>
                                                            <option >Uganda</option>
                                                            <option >Ukraine</option>
                                                            <option >United Arab Emirates</option>
                                                            <option >United Kingdom</option>
                                                            <option >United States</option>
                                                            <option >United States Minor Outlying Islands</option>
                                                            <option >Uruguay</option>
                                                            <option >Uzbekistan</option>
                                                            <option >Vanuatu</option>
                                                            <option >Venezuela, Bolivarian Republic of</option>
                                                            <option >Viet Nam</option>
                                                            <option >Virgin Islands, British</option>
                                                            <option >Virgin Islands, U.S.</option>
                                                            <option >Wallis and Futuna</option>
                                                            <option >Western Sahara</option>
                                                            <option >Yemen</option>
                                                            <option >Zambia</option>
                                                            <option >Zimbabwe</option>
                                                        </select>
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end country -->

                             <!-- start image -->
                            <div class="form-group row">
                                <label for="uimage" class="col-lg-3 col-form-label"><span class=" glyphicon glyphicon-picture"></span>  Photo</label>
                                <div class="col-lg-9">
                                    <input type="file" name="u_image" value="<?php echo $user_image;?>" class="form-control">
                                    <small class="text-muted"></small>
                                </div>
                            </div>
                            <!-- /end image -->


                            <!-- /sign in button -->
                            <button type="submit"  name="update" class="btn btn-block btn-success"> Update <span class=" glyphicon glyphicon-log-in"></span></button>
                            <!-- /end sign in button -->


                        </form><!-- from2 end-->

                                </div>
                          
                        </div>
                        <!-- post section on timeline end-->
                        
       <?php }?>                        
<?php
 include '../includes/connection.php';
if(isset($_POST['update']))
{
 $u_name = $_POST['u_name'];
 $u_pass = $_POST['u_pass'];
 $u_email = $_POST['u_email'];
 $u_gender = $_POST['u_gender'];
 $u_birthday = $_POST['u_birthday'];
 $u_country = $_POST['u_country'];
 $u_registerdate=$_POST['u_registerdate'];
 $u_image = $_FILES['u_image']['name'];
 $image_tmp = $_FILES['u_image']['tmp_name'];
 
 move_uploaded_file($image_tmp, "../user/user_images/$u_image");
 $update="update users set user_name='$u_name',user_pass='$u_pass',user_email='$u_email',user_image='$u_image'"
         . ",user_b_day='$u_birthday',register_date='$u_registerdate',user_country='$u_country',user_gender='$u_gender' where user_id='$user_id'";
 $run= mysqli_query($con, $update);
 
 if($run){
     
     echo "<script>alerts('your profile successfully updated...')</script>";
     echo "<script>window.open('index.php','_self')</script>";
 }
}
?>

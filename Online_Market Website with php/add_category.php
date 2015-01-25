<?php
include_once("session.php"); 
include_once("Car.php");
include_once("UserMangerController.php");
include_once("Home.php");
include_once("Job.php");
?>  
<html>
    <head>
        <title>Category page</title> 
        <style type="text/css">
          .contain { width:500px; margin:0 auto; border:2px green dashed; margin-top:15px; min-height:200px; padding:10px; }
          input { font-size:15px; color:#06C; padding:10px; width:200px; margin-top:25px;   }
          select { font-size:15px; color:#06C; padding:10px; width:200px; margin-top:25px;   }
          .labelname { font-size:20px; font-weight:bold; font-family:Tahoma, Geneva, sans-serif; color:#33C; padding:10px; } 
          #submit { width:100px; height:30px; padding:2px; background-color:#999;}        
          </style>
        <meta charset="UTF-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/style.css" media="screen" />
        <link href="css/bootstrap.min.css" rel="stylesheet"> 
        <link href="css/style.css" rel="stylesheet" media="screen"> 
        <link href="css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="css/main.css" rel="stylesheet" media="screen">
        <link href="css/slick.css" rel="stylesheet" media="screen">
        <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen"> 
        <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">   
        <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">  
    </head> 
    <body bgcolor="#101010"  style="background-color:#101010;">
        <?php 
            ob_start();   
            session_start();
            $email = $_SESSION['login_email'];  
            $id = $_SESSION['id']; 
            if(isset($_POST['car']))
            {     
                 $title = $_POST['title']; 
                 $desc = $_POST['desc'];
                 $place = $_POST['place']; 

                 $name = $_POST['name'];
                 $mobile = $_POST['mobile']; 
                 $note = $_POST['note']; 
                 $category = $_POST['category'];
                 
                 $car_price = $_POST['car_price']; 
                 $car_model = $_POST['car_model'];
                 $image = ""; 
                 $car_km = $_POST['car_km'];
                 $car_brand = $_POST['car_brand']; 
                 $car_capacity = $_POST['car_capacity']; 
                 $ad = new Car( 1, $title , $desc , $image  , $place , $category ,  $id  ,$name,$mobile,$note, $car_brand, $car_price , $car_km , $car_model,$car_capacity); 
                 
                 $control = new UserMangerController();   
                 if($control->createNewAd($ad))
                    echo "<script type='text/javascript'>alert('car added !!');</script>"; 
            }
            else if(isset($_POST['home']))
            {   
                $title = $_POST['title']; 
                $desc = $_POST['desc'];
                $place = $_POST['place']; 

                $name = $_POST['name'];
                $mobile = $_POST['mobile']; 
                $note = $_POST['note']; 
                $category = $_POST['category'];
                $image = "";

                $home_price = $_POST['home_price']; 
                $home_area = $_POST['home_area']; 
                $home_rooms = $_POST['home_rooms']; 
                $home_toils = $_POST['home_toils']; 
                $ad = new Home( 1, $title , $desc , $image , $place , $category ,  $id  ,$name,$mobile,$note, $home_price, $home_area , $home_address , $home_rooms , $home_toils); 
                
                $control = new UserMangerController(); 
                if($control->createNewAd($ad))
                   echo "<script type='text/javascript'>alert('home added !!');</script>";                            
            } 
            else if( isset($_POST['jop']))
            {   
                $title = $_POST['title']; 
                $desc = $_POST['desc'];
                $place = $_POST['place']; 

                $name = $_POST['name'];
                $mobile = $_POST['mobile']; 
                $note = $_POST['note']; 
                $category = $_POST['category'];
                
                $image = "";
                $jop_salary = $_POST['jop_salary']; 
                $jop_Skills = $_POST['jop_Skills']; 
                $jop_experience = $_POST['jop_experience'];
                $jop_type = $_POST['jop_type']; 
                $jop_filed = $_POST['jop_filed']; 
                $ad = new Job( 1, $title , $desc , $image , $place , $category ,  $id  ,$name,$mobile,$note, $jop_experience, $jop_Skills, $jop_filed , $jop_type , $jop_salary); 
                
                $control = new UserMangerController(); 
                if($control->createNewAd($ad))
                   echo "<script type='text/javascript'>alert('jop added !!');</script>"; 
            } 
            
            ob_end_flush();
            /* @var $PHP_SELF type <?php ech $PHP_SELF ?> */
        ?>
        <div class="left" style="background-color:#101010;">
        </div>
        <div class="right" style="background-color:#101010;"> 
        </div>
        <div class="head" style="border-style: solid; background-color:#FFFFFF;"> 
             
             <!-- nav bar  -->
            <header style="height:50px; padding-top:0px;">

                   <nav class="navbar navbar-inverse" role="navigation" style="height:50px; padding-top:2px;">
                      <div class="container-fluid">  
                           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                            <ul class="nav navbar-nav">
                               <li><a href="/online_market/profilePage.php">My Account</a></li>
                               <li><a href="/online_market/homePage.php">Home</a></li> 
                               <li><a href="logout.php">logout</a></li> 
                            </ul> 
                            </div>
                     </div>
                  </nav>
            </header> 
            <br><br>  
            <br>  
              <?php echo '<p style="font-size:40px; color:#FF0000; text-transform: uppercase; ">'.$message.'</p>'; ?>
              <form name="myForm" method="post">
                   <td><label for="name" class="labelname"> Please choose category from the list : </label></td>
                   <td><select name="category" id="category">
                   <option value="-1" selected>choose category</option>
                   <option value="1">Cars</option>
                   <option value="2">Homes</option>
                   <option value="3">Job</option>
                   </select></td> 
              </form>
              <br><br>
              <div align="center" id="cars" class="contain">
                <table cellpadding="5">
                        <form name="car" method="post">
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">Ad information</label></center></td>
                         </tr> 
                         <tr> <td><label for="name" class="labelname"> Title:</label></td>  <td> <input type="text" name="title" required></td>  </tr>
                         <!-- <tr> <td>Image:</td>  <td></td>  </tr> -->
                         <tr> 
                          <td><label for="name" class="labelname"> Place:</label></td>
                          <td> 
                            <select name="place" required  >
                              <option selected  >Select Place</option>
                              <option value="Cairo" >Cairo</option> 
                              <option value="Giza" >Giza</option>
                              <option value="Alex" >Alexandria</option>
                              <option value="Suez">Suez</option> 
                             </select>  
                          </td> 
                          <tr> 
                          <td><label for="name" class="labelname"> Category:</label></td> 
                                <td>
                              <select name="category" required = "TRUE" >
                                <option selected  >Select Category</option> 
                                <option value="Car">Car</option>
                                <option value="Home">Home</option>
                                <option value="Job">Job</option>
                              </select>
                            
                                 </td> 
                          </tr> 
                         </tr>
                          
                         <tr>
                          <td> <label for="name" class="labelname"> Description</label></td>  <td><textarea rows="4" cols="21" name="desc"></textarea></td> 
                           </tr>

                           
                         <tr>
                           <td colspan="2"><center> <label for="name" class="labelname"> .........................</label></center></td>
                         </tr> 
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">Car information</label></center></td>
                         </tr>
                         <tr>
                              <td><label for="name" class="labelname"> Price </label></td><td><input name="car_price" type="text"  required="required"></td>
                         </tr>
                         <tr>
                              <td><label for="name" class="labelname"> model </label></td><td><input name="car_model" type="text"  required="required"></td>
                         </tr>
                         <tr>
                              <td><label for="name" class="labelname"> brand </label></td>
                              <td><select name="car_brand">
                             <option name="honda">Honda</option>
                             <option name="opel">Opel</option>
                             </select></td>
                             </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Number of Kilometer </label></td><td><input name="car_km" type="number"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname"> Car capacity </label></td><td><input name="car_capacity" type="number"  required="required"></td>
                         </tr>
                         <tr>
                           <td colspan="2"><center> <label for="name" class="labelname"> .........................</label></center></td>
                         </tr> 
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">personal information</label></center></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Name </label></td><td><input name="name" type="text"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname"> Mobile </label></td><td><input name="mobile" type="text"  required="required"></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Note </label></td></tr>
                         <tr><td></td><td> <textarea  name="note" rows="4" cols="22"></textarea></td>
                         </tr>                          
                         <tr> <td colspan="2"><center><input type="submit" id="submit" value="submit" name="car"></center></td></tr>
                        </form>
                </table>
              </div> 
            <br>
              <div align="center"  class="contain" id="homes">
                <table cellpadding="5" >
                        <form name="home" method="post">
                        <tr>
                             <td colspan="2">  <center><label for="name" class="labelname">ad information</label></center></td>
                        </tr> 
                        <tr> <td><label for="name" class="labelname"> Title:</label></td>  <td> <input type="text" name="title" required></td>  </tr>
                        <!-- <tr> <td>Image:</td>  <td></td>  </tr> -->
                        <tr> 
                         <td><label for="name" class="labelname"> Place:</label></td>
                         <td> 
                           <select name="place" required  >
                             <option disabled selected  >Select Place</option>
                             <option value="Cairo" >Cairo</option> 
                             <option value="Giza" >Giza</option>
                             <option value="Alex" >Alexandria</option>
                             <option value="Suez">Suez</option> 
                            </select>  
                         </td> 
                        </tr>
                        <tr> 

                          <td><label for="name" class="labelname"> Category:</label></td> 
                              <td>
                            <select name="category" required = "TRUE" >
                              <option selected  >Select Category</option> 
                              <option value="Car">Car</option>
                              <option value="Home">Home</option>
                              <option value="Job">Job</option>
                            </select>
                          
                               </td> 
                        </tr>
                        <tr>
                         <td> <label for="name" class="labelname"> Description</label></td>  <td><textarea rows="4" cols="21"  name="desc"></textarea></td> 
                          </tr>

                          
                        <tr>
                          <td colspan="2"><center> <label for="name" class="labelname"> .........................</label></center></td>
                        </tr> 
                        <tr>
                             <td colspan="2">  <center><label for="name" class="labelname">home information</label></center></td>
                        </tr> 
                         
                         <tr>
                              <td><label for="name" class="labelname"> Price </label></td><td><input name="home_price" type="text"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname"> Area </label></td><td><input name="home_area" type="text"  required="required"></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Number of Rooms </label></td><td><input name="home_rooms" type="number"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname"> Number of Toilts </label></td><td><input name="home_toils" type="number"  required="required"></td>
                         </tr>
                         <tr>
                           <td colspan="2"><center> <label for="name" class="labelname"> .........................</label></center></td>
                         </tr> 
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">personal information</label></center></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Name </label></td><td><input name="name" type="text"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname"> Mobile </label></td><td><input name="mobile" type="text"  required="required"></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Note </label></td></tr>
                         <tr><td></td><td> <textarea  name="note" rows="4" cols="22"></textarea></td>
                         </tr>                     
                         <tr> <td colspan="2"><center><input type="submit" id="submit" value="submit" name="home"></center></td></tr>
                        </form>
                </table>
              </div> 

            <br>
              <div align="center" id="jops" class="contain">
                <table cellpadding="5">
                        <form name="jop" method="post">
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">ad information</label></center></td>
                         </tr> 
                         <tr> <td><label for="name" class="labelname"> Title:</label></td>  <td> <input type="text" name="title" required></td>  </tr>
                         <!-- <tr> <td>Image:</td>  <td></td>  </tr> -->
                         <tr> 
                          <td><label for="name" class="labelname"> Place:</label></td>
                          <td> 
                            <select name="place" required  >
                              <option disabled selected  >Select Place</option>
                              <option value="Cairo" >Cairo</option> 
                              <option value="Giza" >Giza</option>
                              <option value="Alex" >Alexandria</option>
                              <option value="Suez">Suez</option> 
                             </select>  
                          </td> 
                         </tr>
                        <tr> 

                          <td><label for="name" class="labelname"> Category:</label></td> 
                              <td>
                            <select name="category" required = "TRUE" >
                              <option selected  >Select Category</option> 
                              <option value="Car">Car</option>
                              <option value="Home">Home</option>
                              <option value="Job">Job</option>
                            </select>
                          
                               </td> 
                        </tr>
                         <tr>
                          <td> <label for="name" class="labelname"> Description</label></td>  <td><textarea rows="4" cols="21"  name="desc"></textarea></td> 
                           </tr>

                           
                         <tr>
                           <td colspan="2"><center> <label for="name" class="labelname"> .........................</label></center></td>
                         </tr> 
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">jop information</label></center></td>
                         </tr> 
                         
                         <tr>
                              <td><label for="name" class="labelname"> Salary </label></td><td><input name="jop_salary" type="text"  required="required"></td>
                         </tr>

                         <tr>
                            <td><label for="name" class="labelname"> Type </label></td>
                            <td><select name="jop_type">
                            <option name="full" selected> Full Time </option>
                            <option name="part"> Part Time </option>
                            <option name="intern"> Intern </option>
                            </select></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Year of experience </label></td><td><input name="jop_experience" type="text"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname"> Field</label>
                              <select name="jop_filed">
                                <option disabled selected  >Select Field</option>
                                <option name="it"> IT </option>
                                <option name=""> Accounting</option>
                                <option name=""> Mass Communication</option>
                              </select>
                         </tr>
                         <tr>
                          
                         <tr>
                              <td><label for="name" class="labelname"> required skills </label></td></tr>
                         <tr><td></td><td> <textarea  name="jop_skills" rows="4" cols="22"></textarea></td>
                         </tr>
                         <tr>
                           <td colspan="2"><center> <label for="name" class="labelname"> .........................</label></center></td>
                         </tr> 
                         <tr>
                              <td colspan="2">  <center><label for="name" class="labelname">personal information</label></center></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname">  Name </label></td><td><input name="name" type="text"  required="required"></td>
                         </tr>

                         <tr>
                              <td><label for="name" class="labelname">  Mobile </label></td><td><input name="mobile" type="text"  required="required"></td>
                         </tr> 
                         <tr>
                              <td><label for="name" class="labelname"> Note </label></td></tr>
                         <tr><td></td><td> <textarea  name="note" rows="4" cols="22"></textarea></td>
                         </tr>                           
                         <tr> <td colspan="2"><center><input type="submit" id="submit" value="submit" name="jop"></center></td></tr>
                        </form>
                </table>
              </div> 

            <br><br><br><br><br><br><br><br>
            

            <br><br><br><br><br><br><br><br><br><br><br><br>
             <br><br><br><br><br><br><br><br><br><br><br><br>
            
        </div>
        
         
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
         <script type="text/javascript" src="js/script.js"></script> 
         
         
    </body>
    
</html>
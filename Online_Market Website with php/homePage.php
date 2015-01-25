<?php
include_once("session.php"); 
include_once("Car.php");
include_once("UserMangerController.php");
include_once("Home.php");
include_once("Job.php");
if(!class_exists('User.php'))
{
   include_once("User.php");
}
session_start(); 
?>

<html>
    <head>
        <title>Home page</title>
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
        <style type="text/css"> 

            .labelname { font-size:20px; font-weight:bold; font-family:Tahoma, Geneva, sans-serif; color:#33C; padding:10px; }  
        </style> 
        <script type="text/javascript">
             function f1(objButton){   
              window.location.href = "/online_market/full_ad_page.php";
             }
        </script>
    </head> 

       <!-------------------------------------------
            Set Sessions
       ---------------------------------------------->
    <body style="background-color:#101010;">
        <?php
        ob_start();
        $user_obj = new UserMangerController(); 
         
        $email = $_SESSION['login_email'];
        $id = $_SESSION['id'];

        $userName = $user_obj->getUser($email)->getName();

        if (isset($_POST['search'])) {
            $_SESSION['place'] = $_POST['place'];
            $_SESSION['cat'] = $_POST['category'];
            echo("<script>location.href = '/Online_Market/search.php';</script>");
        }
      

        ob_end_flush();
        /* @var $PHP_SELF type <?php ech $PHP_SELF ?> */
        ?>
        <div class="left" > 
        </div>
        <div class="right" > 
        </div>


       <!-------------------------------------------
            Set Page Contents
       ---------------------------------------------->
        <div class="head" style="border-style: solid; background-color:#FFFFFF;"> 
            <div id="block_container">
                <img id="profile" src="img/profile.jpg" style="float:left;">
                <?php echo '<p style="font-size:40px; color:#FF0000; text-transform: uppercase; ">' 
                            . $userName . '</p>'; 
                ?>
            </div> 

            <!-- nav bar  -->
            <header style="height:50px; ">

                <nav class="navbar navbar-inverse" role="navigation" style="height:50px; padding-top:2px;">
                    <div class="container-fluid">  
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                            <ul class="nav navbar-nav">
                                <li><a href="/Online_Market/profilePage.php">My Account</a></li>
                                <li class="active"><a href="/Online_Market/homePage.php">Home</a></li>

                                <li><a href="logout.php">logout</a></li>
                            </ul>

                            <form class="navbar-form navbar-right" role="search" method="post">
                                <div class="form-group">
                                    <select name="place" class="form-control">
                                        <option  selected  >All</option>
                                        <option value="Cairo" >Cairo</option> 
                                        <option value="Giza" >Giza</option>
                                        <option value="Alex" >Alexandria</option>
                                        <option value="Suez">Suez</option> 
                                    </select>  
                                    <select name="category" class="form-control">
                                        <option  selected  >All</option>
                                        <option value="Car">Car</option>
                                        <option value="Home">Home</option>
                                        <option value="Job">Job</option>
                                    </select>
                                </div>
                                <button type="submit" id="search" name="search" class="btn btn-default">Filter</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </header> 
            <br><br> 

            <div id="userads" align="center">
                <table cellpadding="5" class="contain">
                    <form name="home" method="post" class="contain">
                      
                        <center><label for="name" class="labelname"> THIS IS THE LIST OF ADS WE HAVE </label></center>

                        <?php
                        $controller = new UserMangerController();
                        $arr = $controller->filter("All","All");
 
                        for($i=0 ; $i<count($arr) ; $i++){ 
                              echo "<table border=\"4px solid black;\" style=\"width: 60%;border: 4px solid black;\">";
                              echo "<tr><center><button type=\"button\" onclick='f1(this)' style=\"background-color: green; color: white;\" id=\"show\">click here to view the ad with details</button></center></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Title : " . "</center></th><td><center>" . $arr[$i]->getTitle() . "</center></td></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Description : " . "</center></th><td><center>" . $arr[$i]->getDescription() ."</center></td></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Category : " . "</center></th><td><center>" . $arr[$i]->getCategory() . "</center></td></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "place : " . "</center></th><td><center>" . $arr[$i]->getPlace() . "</center></td></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Provider Name : " . "</center></th><td><center>" . $arr[$i]->getProviderName() . "</center></td></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Provider mobile : " . "</center></th><td><center>" . $arr[$i]->getProviderMobile (). "</center></td></tr>";
                              echo "<tr><th style=\"background-color: green; color: white;\"><center>" . "Note : " . "</center></th><td><center>" . $arr[$i]->getNote() . "</center></td></tr>"; 
                              echo "</table>"; 
                              echo "<br>";
                         } 
                        ?>



                    </form>
                </table>
            </div>  
            <br>


            <br><br><br><br><br><br><br><br><br><br>


            <br><br><br><br><br><br><br><br><br><br><br><br>
            <br><br><br><br><br><br><br><br><br><br><br><br>

        </div>


    </body>

</html> 
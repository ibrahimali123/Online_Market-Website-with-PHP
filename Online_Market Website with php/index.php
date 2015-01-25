<?php
 session_start();
 include("UserMangerController.php");
 if (isset($_SESSION['login_email'])) {
     echo("<script>location.href = '/online_market/profilePage.php';</script>"); 
 }
  include_once("User.php");
?>

<html>
    <head>
        <title>Welcome page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="css/style.css">
    </head> 
    <body style="background-color:#101010;">
      <?php       
        $error = 0;
        $errorspaces = "";
        $errorLogin = ""; 
        $errorSignUp = "";
        ob_start(); 
        /*******************************
            Handling Log In Button
        *******************************/

        if (isset($_POST['login'])) 
        {
          $error = 0;
          $errorspaces = "";
          $errorLogin = ""; 
          $errorSignUp = ""; 

          $login_email = $_POST['login_email'];
          $login_pass = $_POST['login_pass']; 
          
          if (empty($login_email) || empty($login_pass)) {
            $errorspaces = "* Please fill the empty cills ";
            $error = 1;
          } 
          if(isset($_POST['login']) && $error == 0)
          {   
            $control = new UserMangerController(); 
            $user =  $control->logIn($login_email, $login_pass); 
            if($user != false){ 
              session_start();                      
              $_SESSION['login_email']=$login_email;
              $_SESSION['id'] = $user->getId();  
              echo("<script>location.href = '/Online_Market/profilePage.php';</script>"); 
            }
            else {
              $errorLogin = '*error Login';
            }
          } 
        }
        /*******************************
            Handling Sign Up Button
        *******************************/

        else if(isset($_POST['signup']) && $error == 0 )
        {  
          $error = 0;
          $errorspaces = ""; 
          $errorSignUp = "";
          $errorLogin = "";
 
          $customerID = ""; 
          $name = $_POST['name']; 
          $email = $_POST['email'];
          $password = $_POST['pass'];
          $confirmPassword = $_POST['confirmpass'];

          

          if (empty($name) || empty($password) || empty($confirmPassword) || empty($email)) {
             $errorspaces = "* Please fill the empty cills ";
             $error = 1;
          }
          if ($password != $confirmPassword) {
                $errorSignUp = '* error different passwords';
                $error = 1;
          } 
          if(isset($_POST['signup']) && $error == 0)
          { 
            $user = new User(0,$email,$password,$name);  
            $control = new UserMangerController(); 
            if($control->signUp($user)){
                echo("<script>location.href = '/Online_Market/profilePage.php';</script>"); 
            }
            else{
              $errorSignUp = "You already have account";
            }               
          } 
        }



        ob_end_flush();
      /* @var $PHP_SELF type <?php ech $PHP_SELF ?> */
      ?>
      <div class="left" > </div>
      <div class="right" > </div>

      <div class="head" style="border-style: solid; background-color:#FFFFFF;">
        <img src="img/header.png" />
        <br>
        <hr />
        <br> 
        <div>
         <span style="color: #FF0000;"><?php echo $errorSignUp;?></span>
         <span style="color: #FF0000;"><?php echo $errorLogin;?></span>
         <span style="color: #FF0000;"><?php echo $errorspaces;?></span>
        </div>
        <div class="block_container">

        <!--------------------------------------------------
               LOG IN FORM
        -------------------------------------------------->
        <div class="login" style="float:right; "> 
          <table cellpadding="5" bgcolor="#E8E8E8" style="height:400px;width:470px; margin-right:15px;" >
            <form name="login" method="post" >
              <tr>
                  <td colspan="2">  <center>   <h1><i><b> login </b></i></h1>  </center></td>
             </tr> 
             
             <tr>
                  <td><center><i><b>E-mail:</b></i></center></td><td><center><input name="login_email" type="text" ></center></td>
             </tr>

             <tr>
                  <td><center><i><b>Password:</b></i></center></td><td><center><input name="login_pass" type="password"></center></td>
             </tr>
             
             <tr>
             <td> <center><input type="submit" name="login" value="login"></center></td>
             </tr> 
             <tr>
                  <td colspan="2">  <center>   <h1><i><b> OR  </b></i></h1>  </center></td>
             </tr> 
             <tr>
              <td colspan="4"><center><input type="button" value="" onClick="pasuser(this.form)" style="background: url(img/login.jpg) no-repeat;background-size:auto; width:200px; height:50px;" ></center></td>
             </tr>
            </form>
           </table>

          </div>

        <!--------------------------------------------------
               SIGN UP FORM
        -------------------------------------------------->
          <div class ="signup" >  
            <table cellpadding="5" bgcolor="#E8E8E8" style="margin-left: 15px; height:400px;width:470px;">
              <form name="signup" method="post">
                 <tr>
                      <td colspan="2">  <center>   <h1><i><b> Sign up<br>  it's free and any one can join </b></i></h1>  </center></td>
                 </tr> 
                 <tr>
                      <td><center><i><b>name:</b></i></td></center><td><center><input name="name" type="text" ></center></td>
                 </tr>
                 <tr>
                      <td><center><i><b>E-mail:</b></i></center></td><td><center><input name="email" type="text" id='txtEmail'></center></td>
                 </tr>
                 <tr>
                      <td><center><i><b>Password:</b></i></center></td><td><center><input name="pass" type="password"></center></td>
                 </tr>
                 
                 <tr>
                      <td><center><i><b>Confirm Password:</b></i></center></td><td><center><input name="confirmpass" type="password"></center></td>
                 </tr>                   
                 
               <tr>
                      <td> <center><input type="submit" name="signup" value="signup" ></center></td>
                      <td> <center><input type="Reset"></form></td>
               </tr>
             </form>
            </table> 
                     
          </div> 
            

          <br><br><br><br><br><br><br><br><br><br>
            
             
        


    </body>
    
</html>
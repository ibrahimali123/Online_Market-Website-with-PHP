<?php

include("DBController.php"); 
class UserMangerController {
    private $systemUser ;
    private $db_controller;

    function UserMangerController() {
       $this->db_controller = new DBController();
    } 

    function logIn($_email, $_pw) { 
       $selectedUser = $this->db_controller->selectUser($_email);

        if($selectedUser == false) //user not exist
          return false;

        if( strcmp($selectedUser->getPassword() , $_pw ) != 0) //wrong password
          return false;

        return $selectedUser;
 
    }
  

 
    function signUp ($user) {
  
       $result = $this->db_controller->selectUser( $user->getEmail() ); 

       if($result != false ) //already exist
          return false;
    
       $this->db_controller->insertNewUser($user );
          return true;
    
    }
   
    function logOut() {
    $systemUser = null;
    }
 
    function createNewAd($_ad ) {
        if($_ad->getCategory() == "Car") {
            return $this->db_controller->insertCar($_ad);
         }
        else if($_ad->getCategory() == "Home"){
            return $this->db_controller->insertHome($_ad);
        }
        else if($_ad->getCategory() == "Job"){
            return $this->db_controller->insertJob($_ad);
        }

 
    } 

    function filter($category , $place ){
        $selectedAdsArray;
        if($category == "All" && $place =="All") {
            $selectedAdsArray = $this->db_controller->selectAllAds();
        }

        else if($category != "All" && $place == "All" ) {
            $selectedAdsArray =  $this->db_controller->selectAdsByCategory($category);
        }

        else if($category == "All" && $place != "All" ) {
            $selectedAdsArray =  $this->db_controller->selectAdsByPlace($place);
        }

        else if($category != "All" && $place != "All") {
            $selectedAdsArray =  $this->db_controller->selectAdsByCategoryAndPlace($category , $place);
        }

        if( count($selectedAdsArray) == 0 )
            return false;
        else
            return $selectedAdsArray;
    }

    function getUserAds($userId) {
        $userAdsArray = $this->db_controller->selectAdsUser($userId);
        return $userAdsArray;
    }

    function getUser($userEmail ){
        return $this->db_controller->selectUser($userEmail);
    }
 


} 

/*
$controller = new UserMangerController();
$arr = $controller->getUserAds(1);
//arr = $controller->filter("Job" , "All");
for($i=0 ; $i<count($arr) ; $i++)
    echo $arr[$i]->getTitle()."<br>";
*/

?>

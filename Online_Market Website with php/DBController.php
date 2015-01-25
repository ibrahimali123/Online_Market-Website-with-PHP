<?php 

include_once("User.php");
include_once("Car.php");
include_once("Home.php");
include_once("Job.php");
class DBController {
    private $servername;
    private $username;
    private $password;
    private $database;
    private $conn;
    
    function DBController() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "root";
        $this->database = "OnlineMarket_DB";
        $this->conn = new mysqli($this->servername , $this->username , $this->password , $this->database );
 
    }
/******************************
        USER 
******************************/
    function insertNewUser($_user ) {
        $sql = "INSERT INTO User (email , password , name ) VALUES ( '".$_user->getEmail()."','"
                                                                        .$_user->getPassword()."' ,'" .$_user->getName()."')";

        return $this->conn->query($sql); //Return True/False   
    }
    function selectUser($_email) {
        //1- select user
        //2- return user or false
         
        $sql = "SELECT * FROM User WHERE email = '".$_email ."'";
     
        $result = $this->conn->query($sql) ;
 
        if( ($result->num_rows ) == 0 )
            return false;
        
        else  {
            $adRow = $result->fetch_Assoc()  ;
            return new User($adRow["id"] , $adRow["email"] , $adRow["password"] , $adRow["name"] , $adRow["facebook_name"] );
        }
    }

/******************************
        ADS INSERTION
******************************/
 
    function insertAd($_ad ) {
        $sql = "INSERT INTO Ad(title , image , description , place , category , Userid , provider_name , provider_mobile , note) 
                values('".$_ad->getTitle()."','".$_ad->getImage()."','".$_ad->getDescription()."','".$_ad->getPlace()."','"
                         .$_ad->getCategory()."','".$_ad->getProviderId()."','".$_ad->getProviderName(). "','" 
                         .$_ad->getProviderMobile()."','".$_ad->getNote()."')";
        
        $this->conn->query($sql);

        return $this->conn->insert_id; 
    }

    function insertCar($_ad ) {
        $car_id = $this->insertAd($_ad);
        $sql = "INSERT INTO Car VALUES ('".$car_id."','".$_ad->getBrand()."','". $_ad->getModel()."','".$_ad->getPrice()."','"
                                                        .$_ad->getKMs()."','".$_ad->getCapacity()."')";
        return $this->conn->query($sql);
    }

    function insertHome($_ad ) {
        $home_id = $this->insertAd($_ad);
        $sql = "INSERT INTO Home VALUES ('".$home_id."','".$_ad->getPrice()."','". $_ad->getArea()."','".$_ad->getAdress()."','"
                                                        .$_ad->getRooms()."','".$_ad->getToilets()."')";
        return $this->conn->query($sql);
 
    }

    function insertJob($_ad ) {
        $job_id = $this->insertAd($_ad);
        $sql = "INSERT INTO Job VALUES ('".$job_id."','". $_ad->getExperienceYears()."','".$_ad->getSkills()."','".
                                            $_ad->getField() ."','".$_ad->getType()."','".$_ad->getSalary()."')";
        return $this->conn->query($sql);
    }


/******************************
        ADS SELECTION
******************************/
    function selectAd($adId ){
        $sql = "SELECT * FROM Ad WHERE id= $adId ";
        $adResult = $this->conn->query($sql);
        if($adResult->num_rows == 0 )
            return false; 
 

        $selcetedAdsArray = $this->getAdsArray($adResult);  //return array of one element
       return  $selcetedAdsArray[0];

    }

    function selectAllAds(){
        $sql = "SELECT * FROM Ad";
        $adResult = $this->conn->query($sql);

        $selectedAdsArray = array();        
        if( ($adResult->num_rows) == 0) { echo "HERE";
            return $selectedAdsArray;
        } 
        $selectedAdsArray = $this->getAdsArray($adResult);  //function return the ads selected in query 
        return $selectedAdsArray;
    } 

 
    function selectAdsByCategory($category){
        $sql = "SELECT * FROM Ad WHERE category = '".$category."'";
        $adResult = $this->conn->query($sql);

        $selectedAdsArray = array();        
        if( ($adResult->num_rows) == 0) 
            return $selectedAdsArray;

        $selectedAdsArray = $this->getAdsArray($adResult);  //function return the ads selected in query

        return $selectedAdsArray;
    } 

    

    function selectAdsByPlace($place){
        $sql = "SELECT * FROM Ad WHERE place = '".$place."'";
        $adResult = $this->conn->query($sql);

        $selectedAdsArray = array();        
        if( ($adResult->num_rows) == 0) 
            return $selectedAdsArray;

        $selectedAdsArray = $this->getAdsArray($adResult);  //function return the ads selected in query

        return $selectedAdsArray;
    } 
    

    function selectAdsByCategoryAndPlace($category , $place){
        $sql ="SELECT * FROM Ad WHERE place = '".$place."' and category = '".$category."'"; 
        $adResult = $this->conn->query($sql);

        $selectedAdsArray = array();        
        if( ($adResult->num_rows) == 0) 
            return $selectedAdsArray;

        $selectedAdsArray = $this->getAdsArray($adResult);  //function return the ads selected in query

        return $selectedAdsArray;
    } 

    function selectAdsUser($userid){
        $sql ="SELECT * FROM Ad WHERE Userid = ".$userid; 
        $adResult = $this->conn->query($sql);

        $selectedAdsArray = array();        
        if( ($adResult->num_rows) == 0) 
            return $selectedAdsArray;

        $selectedAdsArray = $this->getAdsArray($adResult);  //function return the ads selected in query

        return $selectedAdsArray;
    } 
  
 
    function updateAd($_ad ) {
         
         
    }

   
    function openConnectionToDB() {
   /*        $conn = new mysqli($servername,$username,$password,$database); 
       if($conn->connect_error)
        return false;*/
    }

 
    private function getAdsArray($adResult) {
        $selectedAdsArray = array();
        $selectedAd;
        while($adRow = $adResult->fetch_assoc()) { 
            $sql =" SELECT * FROM ".$adRow["category"]. " WHERE Adid = '".$adRow["id"]."'" ;
            
            $categoryResult= $this->conn->query($sql); 
            $categoryRow = $categoryResult->fetch_assoc();

            if($adRow["category"]  == "Car" ){
                $selectedAd = new Car($adRow["id"],$adRow["title"],$adRow["description"],$adRow["image"],$adRow["place"], 
                                 $adRow["category"], $adRow["Userid"],$adRow["provider_name"],$adRow["provider_mobile"],$adRow["note"],
                                 $categoryRow["brand"],$categoryRow["price"],$categoryRow["kms"],$categoryRow["model"],$categoryRow["capacity"]);
            }

            else if($adRow["category"]  == "Home" ){ 
                $selectedAd = new Home($adRow["id"],$adRow["title"],$adRow["description"],$adRow["image"],$adRow["place"],$adRow["category"],
                                    $adRow["Userid"],$adRow["provider_name"],$adRow["provider_mobile"],$adRow["note"],
                                    $categoryRow["price"],$categoryRow["area"],$categoryRow["address"],$categoryRow["rooms"],$categoryRow["toilets"]);             
            
            
            }
            else if($adRow["category"]  == "Job" ){ 
                $selectedAd = new Job($adRow["id"],$adRow["title"],$adRow["description"],$adRow["image"],$adRow["place"],$adRow["category"],
                                 $adRow["Userid"],$adRow["provider_name"],$adRow["provider_mobile"],$adRow["note"],
                                 $categoryRow["experience"],$categoryRow["skills"],$categoryRow["field"],$categoryRow["type"],$categoryRow["salary"]);   
            }
                    
            array_push($selectedAdsArray, $selectedAd);  
        }

        return $selectedAdsArray;
    }


}


  /*
    $d = new DBController();
    echo $d->selectAd(1)->getTitle();
    */
    ?>

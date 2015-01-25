 
 <?php
include("User.php");
class FacebookUser extends User {
	private $facebookName;
 
    	function FacebookUser($_id, $email, $password, $name,$_fname) {
		parent::__construct($_id, $email, $password, $name);
       		$this->facebookName = $_name;

    	}
  
 
	function setFacebookName ($_name ) {
       		$this->facebookName = $_name;
   	 }
 
	function getFacebookName () { 
        	return  $this->facebookName;
   	 }

}

?>

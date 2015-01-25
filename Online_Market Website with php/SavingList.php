<?php 
 class SavingList {
	private $adsList = array() ;  //hold ads
     
    function SavingList() {
    }
	function add ($_ad ) {			//add ad to saving list
		array_push( $this->list , _ad );
	}

    function remove($_ad ) {		//remove ad from saving list  
    }

    function setName($_name ) {
       $this->name = $_name;
    }
 
    function getName() {
        return $this->name;
    }

	function getUser() {
   //     return this->user;
    }

}
?>
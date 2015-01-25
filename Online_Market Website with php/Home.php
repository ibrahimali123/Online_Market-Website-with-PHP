<?php
include_once("Ad.php");
class Home extends Ad {

    private $price;
    private $area;
    private $rooms;
    private $toilets;
    private $address;
    /** ********************
    /* Constructors
    /******************** */

    function Home($_id, $_title, $_description, $_image, $_place, $_category,    //general ad info
		 $_provider_id , $_provider_name , $_provider_mobile,$_note,     //provider info
			$_price,$_area, $_address, $_rooms, $_toilets) {	 	 //home info

        parent::__construct($_id, $_title, $_description, $_image, $_place, $_category,    //call parent contructor
				 $_provider_id , $_provider_name , $_provider_mobile,$_note);

        $this->price = $_price;
        $this->area = $_area;
        $this->rooms = $_rooms;
        $this->toilets  = $_toilets;
		$this->address=$_address;
    }

    /*     * ********************
      /* Setters
      /******************** */

    function setPrice($_price) {
        $this->price = $_price;
    }

    function setArea($_area) {
        $this->area = $_area;
    }

    function setAddress($_address) {
        $this->address = $_address;
    }

    function setRooms($_rooms) {
        $this->rooms = $_rooms;
    }

    function setToiltes($_toilets) {
        $this->toilets = $_toilets;
    }

    /**********************
    /* Getters
    /******************** */

    function getPrice() {
        return $this->price;
    }

    function getArea() {
        return $this->area;
    }

    function getAdress() {
        return $this->address;
    }

    function getRooms() {
        return $this->rooms;
    }

    function getToilets() {
        return $this->toilets;
    }

}
?>

<?php

class Ad {

    protected $id;
    protected $title;
    protected $description;
    protected $image;
    protected $place;
    protected $category; 
    protected $provider_id;
    protected $provider_name;
    protected $provider_mobile;
    protected $note;

    /************************
      /* Constructors
      /*********************/

    function Ad($_id, $_title, $_description, $_image, $_place, $_category, $_provider_id , $_provider_name , $_provider_mobile,$_note) {
        $this->id = $_id;
        $this->title = $_title;
        $this->description = $_description;
        $this->image = $_image; 
        $this->place = $_place; 
        $this->category = $_category; 
        $this->provider_id = $_provider_id; 
        $this->provider_name = $_provider_name; 
        $this->provider_mobile= $_provider_mobile; 
        $this->note = $_note; 
    }

    /************************
      /* Setters
      /******************** */

    function setId($_id) {
        $this->provider = $_id;
    }

    function setTitle($_title) {
        $this->title = $_title;
    }

    function setDescription($_tdescription) {
        $this->description = $_description;
    }

    function setImage($_image) {
        $this->image = $_image;
    }

    function setPlace($_place) {
        $this->place = $_place;
    }

    function setCategory($_provider) {
        $this->provider = $_provider;
    }

    function setProviderId($_provider_id ) { 
		$this->provider_id = $_provider_id;
    }
    function setProviderName($_name ) { 
		$this->provider_name=$_name;
    }
 
    function setProviderMobile($_mobile ) { 
		$this->provider_mobile=$mobile;
    }
 
    function setNote($_note ) { 
		$this->note=$_note;	
    }

    /************************
      /* Getters
      /**********************/

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }

    function getPlace() {
        return $this->place;
    }

    function getCategory() {
        return $this->category;
    }

    function getProviderId() {
        return $this->provider_id;
    }

    function getProviderName() {
        return $this->provider_name;
    }

    function getProviderMobile () {
        return $this->provider_mobile;
    }


    function getNote() {
        return $this->note;
	}

}
?>

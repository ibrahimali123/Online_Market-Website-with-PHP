<?php

include_once("Ad.php");

class Car extends Ad {

    private $brand;
    private $model;
    private $price;
    private $numberOfKMs;
    private $engineCapacity;

    /***********************
    /* Constructors
    /*********************/

    function Car($_id, $_title, $_description, $_image, $_place, $_category,    //general ad info
		 $_provider_id , $_provider_name , $_provider_mobile,$_note,    //provider info
		 $_brand, $_price, $_kms, $_model, $_capacity) { 	        //car info

        parent::__construct($_id, $_title, $_description, $_image, $_place, $_category,    //call parent contructor
				 $_provider_id , $_provider_name , $_provider_mobile,$_note);
        $this->brand = $_brand;
        $this->model = $_model;
        $this->price = $_price;
        $this->numberOfKMs = $_kms;
        $this->engineCapacity = $_capacity;
    }

    /**********************
      /* Setters
      /*********************/

    function setBrand($_brand) {
        $this->brand = $_brand;
    }

    function setPrice($_price) {
        $this->price = $_price;
    }

    function setKMs($_kms) {
        $this->numberOfKMs = $_kms;
    }

    function setModel($model) {
        $this->model = $model;
    }

    function setCapacity($_capacity) {
        $this->engineCapacity = $_capacity;
    }

    /**********************
      /* Getters
      /*********************/

    function getBrand() {
        return $this->brand;
    }

    function getModel() {
        return $this->model;
    }

    function getPrice() {
        return $this->price;
    }

    function getKMs() {
        return $this->numberOfKMs;
    }

    function getCapacity() {
        return $this->engineCapacity;
    }

}
?>


<?php
include_once("Ad.php");
class Job extends Ad {


    private $yearsOfExperience;
    private $requiredSkills;
    private $jobField;
    private $jobType; 
    private $salary;

    /***********************
    /* Constructors
    /*********************/

    function Job($_id, $_title, $_description, $_image, $_place, $_category, //general ad info
 			$_provider_id , $_provider_name , $_provider_mobile,$_note,//provider info
		 	 $_yearsOfExperience, $_requiredSkills, $_jobField, $_jobType,$_salary) {//job info

        parent::__construct($_id, $_title, $_description, $_image, $_place, $_category,    //call parent contructor
				 $_provider_id , $_provider_name , $_provider_mobile,$_note);


        $this->yearsOfExperience = $_yearsOfExperience;
        $this->requiredSkills = $_requiredSkills;
        $this->jobField = $_jobField;
        $this->jobType = $_jobType;
        $this->salary = $_salary;
    }
 
   /**********************
   /* Setters
   /*********************/
    function setSalary($_salary) {
        $this->salary = $_salary;
    }

    function setExprienceYears($_exp) {
        $this->yearsOfExperience = $_exp;
    }

    function setRequiredSkilles($_skills) {
        $this->requiredSkills = $_skills;
    }

    function setField($_field) {
        $this->jobField = $_field;
    }

    function setType($_type) {
        $this->jobType = $_type;
    }

   /**********************
      /* Getters
      /*********************/
    function getSalary() {
        return $this->salary;
    }

    function getExperienceYears() {
        return $this->yearsOfExperience;
    }

    function getSkills() {
        return $this->requiredSkills;
    }

    function getField() {
        return $this->jobField;
    }

    function getType() {
        return $this->jobType;
    }

}
?>

<?php

class person {

	var $name;
	public $facebook = "Bolaji";
	private $linkedin = "Bhijay";
	protected $atmpin = "2302";

	function __construct($person_name){
		this->name = $person_name;

	}

	public function set_name($name) {
  		
  		$this->name = $name;
  		
 	}

	public function get_name() {

		echo $this->facebook;
		echo $this->linkedin;
		
		echo "<br>";
		return $this->name;
	}

}

<?php
class Entity_TestEntity{

	public function __construct($data = false){
		if($data){
			foreach ($data as $k => $v){
				$this -> $k = $v;
			}
		}
	}

	public function __get($name) {
		return $this->$name;
	}

	public function __set($name, $value) {
		$this->$name = $value;
	}

	public function __set(){

	}

	public function save($manager){

	}
}
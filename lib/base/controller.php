<?php
abstract class Base_Controller{
	
	protected $action;
	protected $model;
	protected $view;
	protected $viewData;
	
	public function __construct($model,$action = "defaultAction"){
		if(method_exists($this,$action)){
			$this->action = $action;
		} else {
			throw new Exception_404();
		}
		$this->model = $model;
		$this->viewData = new View_Data();
		$this->setControllerViewData();
	}
	
	public function executeAction(){
		return $this->{$this->action}();
	}
	
	abstract public function defaultAction();
	
	abstract protected function setControllerViewData();
	
	abstract protected function generateView();
	
}
<?php
class HomeController extends Base_Controller{
	
	public function defaultAction(){
		$this->generateView();
	}
	
	protected function setControllerViewData(){
		$this->viewData->set('title', 'Home');
		$this->viewData->set('css', array(CSS.DS.'style.css'));
		$this->viewData->set('js', array(JS.DS.'script.js'));
	}
	
	protected function generateView(){
		$this->view = new Base_View(get_class($this), $this->action, $this->viewData);
		$this->view->render();
	}
}

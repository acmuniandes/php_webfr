<?php
class Base_View{
	protected $viewFile;
	protected $viewData;
	
	public function __construct($controllerClass, $action, $viewData) {
		$controllerName = str_replace("Controller", "", $controllerClass);
		$this->viewFile = VIEWS . DS . strtolower($controllerName) . DS . strtolower($action) . ".php";
		$this->viewData = $viewData;
		$this->setCommonViewData();
	}
	
	public function __get($name){
		return $this->$name;
	}
	 
	public function render($template = "layout") {
		if (file_exists($this->viewFile)) {
			if ($template) {
				//include the full template
				$templateFile = VIEWS . DS . $template.".php";
				if (file_exists($templateFile)) {
					require $templateFile;
				} else {
					throw new Exception_404();
				}
			} else {
				//we're not using a template view so just output the method's view directly
				require $this->viewFile;
			}
		} else {
			throw new Exception_404();
		}
	
	}
	
	protected function setCommonViewData(){
		//e.g. $this->viewData->set("mainMenu",array("Home" => "/home", "Help" => "/help"));
		
		$dir = new DirectoryIterator(CSS_LIB.DS);
		$csslib = array();
		foreach ($dir as $fileinfo) {
			if (!$fileinfo->isDot() && $fileinfo->isFile()) {
				$csslib[] = $fileinfo->getFilename();
			}
		}
		$this->viewData->set("csslib", $csslib);		
		$this->viewData->set("jslib", array(JS_LIB.DS."jquery.min.js", JS_LIB.DS."bootstrap.min.js"));
		
	}
}
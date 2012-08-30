<?php
class Home extends Controller{

	public function __construct(){
	
		parent::Controller();
		
		$this -> load -> helper("url");
	
	}
	
	public function index(){
	
		$this -> load -> view('home');
	
	}



}

?>
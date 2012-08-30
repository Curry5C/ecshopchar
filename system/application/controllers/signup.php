<?php
class Signup extends Controller{

	public function __construct(){
	
		parent::Controller();
		
		$this -> load -> helper(array('form','url'));
		
		$this -> load -> library('form_validation');
		
	}
	
	public function index(){
	
		$this -> load -> view('signup_form');
	}
	
	public function submit(){
	
		if($this -> _submit_validate() === FALSE){
		
			$this -> index();
			
			return;
		
		}
		
		$u = new Muser();
		
		$u -> username = $this -> input -> post('username');
		
		$u -> password = $this -> input -> post('password');
		
		$u -> email    = $this -> input -> post('email');
		
		$u -> save();
		
		$this -> load -> view('submit_success');
	
	}
	
	public function _submit_validate(){
	
		//验证规则
		$this -> form_validation -> set_rules('username','Username','required|alpha_numeric|min_length[6]|max_length[12]|unique[Muser.username]');
	
		$this -> form_validation -> set_rules('password','Password','required|min_length[6]|max_length[12]');

		$this -> form_validation -> set_rules('passconf','Confirm Password','required|matches[password]');

		$this -> form_validation -> set_rules('email','E-mail','required|valid_email|unique[Muser.email]');

		return $this -> form_validation -> run();	
	}	
	
}

?>
<?php
class Login extends Controller{

	public function __construct(){
		parent::Controller();
		
		$this -> load -> helper(array('form','url'));
		$this -> load -> library('form_validation');
	}
	
	public function index(){
	
		$this -> load -> view('login_form');
	
	}
	
	public function submit(){
	
		if($this -> _submit_validate() === FALSE){
			$this -> index();
			return;
		}
		redirect('/');
	}
	
	private function _submit_validate(){
		$this -> form_validation -> set_rules('username','Username','trim|required|callback_authenticate');
		$this -> form_validation -> set_rules('password','Password','trim|required');
		$this -> form_validation -> set_message('authenticate','Invalid login.Please try again.');
		return $this -> form_validation -> run();
	}
	
	public function authenticate(){
	//从username取得User对象
	/*
	if($u = Doctrine::getTable('Muser') -> findOneByUsername($this -> input -> post('username'))){
		//建立对象,为变异(加密)password
		$u_input = new Muser();
		$u_input -> password = $this -> input -> post('password');
		//密码匹配（比较加密的password）
		if($u -> password == $u_input -> password){
			unset($u_input);
			return TRUE;
		}
		unset($u_input); //注销这个为加密password而生的对象，防止意外保存到数据库里
	}
	return FALSE;
	*/
		return Current_User::login($this -> input -> post('username'),$this -> input -> post('password'));
	
	}
}
?>
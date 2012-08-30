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
	//��usernameȡ��User����
	/*
	if($u = Doctrine::getTable('Muser') -> findOneByUsername($this -> input -> post('username'))){
		//��������,Ϊ����(����)password
		$u_input = new Muser();
		$u_input -> password = $this -> input -> post('password');
		//����ƥ�䣨�Ƚϼ��ܵ�password��
		if($u -> password == $u_input -> password){
			unset($u_input);
			return TRUE;
		}
		unset($u_input); //ע�����Ϊ����password�����Ķ��󣬷�ֹ���Ᵽ�浽���ݿ���
	}
	return FALSE;
	*/
		return Current_User::login($this -> input -> post('username'),$this -> input -> post('password'));
	
	}
}
?>
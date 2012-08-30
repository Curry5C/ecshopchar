<?php
class Current_User{
	private static $user;
	private function __construct(){}
	public static function user(){
		if(!isset(self::$user)){
		
			$CI = &get_instance();
			$CI -> load -> library('session');
			if(!$user_id = $CI -> session -> userdata('user_id')){
				return FALSE;
			}
			
			if(!$u = Doctrine::getTable('Muser') -> find($user_id)){
				return FALSE;
			}
			self::$user = $u; //user���󱣴浽��̬����$user
		}
		return self::$user;
	
	}
	
	
	public static function login($username,$password){
		//�õ�User object �� username
		if($u = Doctrine::getTable('Muser') -> findOneByUsername($username)){
			//�������(����)�����password
			$u_input = new Muser();
			$u_input -> password = $password;
			
			//passwordƥ��(���ܹ�������)
			if($u -> password == $u_input -> password){
				unset($u_input);
				$CI = &get_instance();
				$CI -> load -> library('session');
				$CI -> session -> set_userdata('user_id',$u -> id);
				self::$user = $u;
				return TRUE;
			}
			unset($u_input);
		}
		
		//����ʧ��
		return FALSE;
	}
	
	public function __clone(){
	
		trigger_error('Clone is not allowed.',E_USER_ERROR);
	
	}

}

?>
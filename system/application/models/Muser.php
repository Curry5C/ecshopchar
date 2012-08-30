<?php
class Muser extends Doctrine_Record{
	
	//��������
	public function setTableDefinition(){
	
		$this -> hasColumn('username','string',255,array('unique'=>'true'));
		$this -> hasColumn('password','string',255);
		$this -> hasColumn('email','string',255,array(
		
		'unique'=>'true' //������֤email������
		
		));
	
	//֧�ֺܶ��е�����,����ö��
		/*
		$this -> hasColumn('status','enum',null,
			array('values'=>array('unverfied','verified','disabled'))
		);
		
		$this -> hasColumn('referer_id','integer',4);
		*/
	}
	
	
	//����һЩѡ��
	public function setUp(){
		//����һ����ΪPost�Ĺ�ϵ
		/*
		$this -> hasMany('Post as Posts',array(
			'local'=>'id',
			'foreign'=>'post_id'
		));
		
		//����������һ������Ĺ�ϵ
		$this -> hasOne('User as Referer',array(
			'local' => 'referer_id',
			'foreign' => 'id'
		));
		*/
		//����'created_at' and 'updated_at' �ֶ�Ϊ�Զ�����
		$this -> setTableName('User');
		$this -> actAs('Timestampable');
		
		//password field gets a mutator assigned,for automatic encryption
		$this -> hasMutator('password','md5Password');
	}
	
	//a mutator function
	public function md5Password($value){
		$salt = '#*seCrEt!@-*%';
		$this -> _set('password',md5($salt.$value));
	
	}	


}
?>
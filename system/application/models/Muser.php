<?php
class Muser extends Doctrine_Record{
	
	//定义表的列
	public function setTableDefinition(){
	
		$this -> hasColumn('username','string',255,array('unique'=>'true'));
		$this -> hasColumn('password','string',255);
		$this -> hasColumn('email','string',255,array(
		
		'unique'=>'true' //可以验证email的输入
		
		));
	
	//支持很多列的类型,包括枚举
		/*
		$this -> hasColumn('status','enum',null,
			array('values'=>array('unverfied','verified','disabled'))
		);
		
		$this -> hasColumn('referer_id','integer',4);
		*/
	}
	
	
	//设置一些选项
	public function setUp(){
		//创建一个名为Post的关系
		/*
		$this -> hasMany('Post as Posts',array(
			'local'=>'id',
			'foreign'=>'post_id'
		));
		
		//甚至可以有一个自身的关系
		$this -> hasOne('User as Referer',array(
			'local' => 'referer_id',
			'foreign' => 'id'
		));
		*/
		//设置'created_at' and 'updated_at' 字段为自动更新
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
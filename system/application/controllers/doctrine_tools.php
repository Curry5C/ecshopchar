<?php
class Doctrine_Tools extends Controller{

	function create_tables(){
		echo '��ʾ����ȷ�ϱ�����.<br/>
		<form action="" method="POST">
		<input type="submit" name="action" value="Create Tables"><br/><br/>';
		
		if($this -> input -> post('action')){
			Doctrine::createTablesFromModels();//��ȡDoctrineģ�ͣ��������ݿ��ﴴ����
			echo "��ɣ�";
		}
	}


}


?>
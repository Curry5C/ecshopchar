<?php
class Doctrine_Tools extends Controller{

	function create_tables(){
		echo '提示：请确认表不存在.<br/>
		<form action="" method="POST">
		<input type="submit" name="action" value="Create Tables"><br/><br/>';
		
		if($this -> input -> post('action')){
			Doctrine::createTablesFromModels();//读取Doctrine模型，并在数据库里创建表
			echo "完成！";
		}
	}


}


?>
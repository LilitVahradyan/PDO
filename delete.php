<?php 
	require_once 'parent.php';
	try{
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$pdo = $connect->prepare('DELETE FROM users WHERE id=:id');
			$pdo->bindParam(':id',$id);
			$pdo->execute();
		}
		$connect = null;
	}catch(PDOExecption $e){
		echo $e->getMessage();
    }

?>
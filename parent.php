<?php 
   $host = 'localhost';
   $username = 'root';
   $password = '';
   $dbName = "myDbPDO";
   
   try{
   	 $connect = new PDO("mysql:host=$host;dbname=$dbName", $username,  $password);
   	 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	 //echo 'Connection successfully!';

   }catch(PDOException $e){
   	die($e->getMesage());
   } 
?>
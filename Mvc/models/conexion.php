<?php
 class Conexion{
 	public static function conectar(){
 		$link = new PDO("mysql:host=localhost;dbname=basedatos","admin","d10e54838b7899432ed12e60b9d00f82afd9d012bc7e97c5");
 		return $link;
 	}
 }
?>
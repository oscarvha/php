<?php

class Conexion{

	public function conectar(){
          //host+basedatos  //usuario // pasword
		$link = new PDO("mysql:host=localhost;dbname=cursophp","root","");
		return $link;
	}
}


?>
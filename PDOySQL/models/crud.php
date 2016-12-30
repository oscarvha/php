<?php 
//Por segurida incluir aqui la conexion
//SE EXTIENDE POR :Que utilizamos funciones de Conexion, manipular no simplemente llamarla 
require_once "conexion.php";
class Datos extends Conexion{
//REGISTRO USUARIOS
	public function registroUsuarioModel($datos,$tabla){
     
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, email) VALUES (:usuario,:password,:email)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);


	 //EJECUTAR

		 if($stmt ->execute())
		 {
		 	return "success";

		 }else{

		 	return "error";
		 }
		// Cerrar conexiones por seguridad

		 $stmt->close();

	}

//INGRESO USUARIO

	public function ingresoUsuarioModel($datos,$tabla){
     
		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.
			
		$stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario = :usuario");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->execute();

	 //EJECUTAR
		//fech() Obitene una fila de un conjunto de resultado asociado al objeto PDO
	    return $stmt->fetch();

	    $stmt->close();
	

	}


	public function vistaUsuariosModel($tabla){
    
      	$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla ");	
     
      	$stmt->execute();
         
        //DEVUELVE Todas las filas de busqueda SQL 
      	return $stmt->fetchAll();

      	$stmt->close();
	}


	public function editarUsuarioModel($id,$tabla){
 		
      	$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla WHERE id = :id ");	
        
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

      	$stmt->execute();
          
      	return $stmt->fetch();

      	$stmt->close();


	}

	public function actualizarUsuarioModel($datos,$tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password =:password, email=:email WHERE id=:id" );

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt ->execute())
		 {
		 	return "success";

		 }else{

		 	return "error";
		 }
		// Cerrar conexiones por seguridad

		 $stmt->close();
	}

	public function borrarUsuarioModel($id,$tabla){

    	$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id=:id");

    	$stmt->bindParam(":id", $id, PDO::PARAM_INT);

    		if($stmt ->execute())
		 {
		 	return "success";

		 }else{

		 	return "error";
		 }
		// Cerrar conexiones por seguridad

		 $stmt->close();
	}

}



 ?>
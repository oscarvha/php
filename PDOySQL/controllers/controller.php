<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
    //registro
	public function registroUsuarioController(){

        if(isset($_POST["usuarioRegistro"])){
			

				$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      "email"=>$_POST["emailRegistro"]);

	 $respuesta = Datos::registroUsuarioModel($datosController,"usuarios");

	 echo $respuesta;
		  if($respuesta=="success")
		  {
		  
	
		header("location:index.php?action=ok");

		
		

		  }else{

	        header("location:index.php");

		  }

		}
	}


    public function ingresoUsuarioController(){

    	
        if(isset($_POST["usuarioIngreso"])){
	
				$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

	 $respuesta = Datos::ingresoUsuarioModel($datosController,"usuarios");

	//var_dump($respuesta);
	echo $respuesta["usuario"];

	if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
      

      	 	session_start();
			$_SESSION["validar"] = true;
		
      header("location:index.php?action=usuarios");

	}else{

    
      header("location:index.php?action=fallo");

	}

		}

    }


    //VISTA DE USUARIOS

    public function vistaUsuariosController(){

    	$respuesta = Datos::vistaUsuariosModel("usuarios");

    	// var_dump($respuesta);

	  foreach ($respuesta as $row => $item) {
	  	
	  		 echo '<tr>
					<td>'.$item["usuario"].'</td>
					<td>'.$item["password"].'</td>
					<td>'.$item["email"].'</td>
					<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
					<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>borrar</button></a></td>
				
				</tr>';
	 	}
    
    }

 public function editarUsuarioController(){

 	$id = $_GET["id"];


 	$respuesta = Datos::editarUsuarioModel($id, "usuarios");
 	
 	echo '<input type="hidden" name="idEditar"  value="'.$respuesta["id"].'">

 		  <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>

		  <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required>

	      <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required>

	      <input type="submit" value="Actualizar">';


 }

	public function actualizarUsuarioController(){
  
    

		if(isset($_POST["usuarioEditar"])){

			$datos = array("id" =>$_POST["idEditar"],
						   "usuario" =>$_POST["usuarioEditar"],
						   "password" =>$_POST["passwordEditar"],
						   "email" =>$_POST["emailEditar"] );

			$respuesta = Datos::actualizarUsuarioModel($datos, "usuarios");

			if($respuesta=="success"){
			  
				header("location:index.php?action=cambio");

			}else{

		        echo "ERROR";

			}

		}

	}
//BOORAR USUARIOS
   public function borrarUsuariosController(){

   		if(isset($_GET["idBorrar"])){

   			$datos = $_GET["idBorrar"];

   			$respuesta = Datos::borrarUsuarioModel($datos,"usuarios");

   			
   			echo $respuesta;

   				if($respuesta=="success"){
			  
				header("location:index.php?action=usuarios");

			}else{

		        echo "ERROR";

			}

   		}

   }


}


?>
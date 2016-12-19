<?php

class EnlacesPaginas{
    
    public function enlacesPaginasModel($enlacesModel) {
       if($enlacesModel == "nosotros" || 
          $enlacesModel == "contacto" ||  
           $enlacesModel == "servicios"){
           
           $module = "views/modules/$enlacesModel.php";
       }else if($enlacesModel=="index"){
           $module = "views/modules/inicio.php";
       }else {
           //lista blanca : bloque al usuario todas las url que no son propias 
           $module = "views/modules/inicio.php";
       }
     
        return $module;
    }
            
            
}

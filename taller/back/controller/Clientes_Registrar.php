<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once realpath('../facade/ClientesFacade.php');

       // $id = strip_tags($_POST['id']);
        $nombres = strip_tags($_POST['nombres']);
        $apellidos = strip_tags($_POST['apellidos']);
        $cedula = strip_tags($_POST['cedula']);
        $edad = strip_tags($_POST['edad']);
        $correo = strip_tags($_POST['correo']);
        $telefono = strip_tags($_POST['telefono']);
        $fecha_nacimiento = strip_tags($_POST['fecha_nacimiento']);
     //   $created_at = strip_tags($_POST['created_at']);
     //   $updated_at = strip_tags($_POST['updated_at']);
        
      if($nombres=== ''|| $apellidos === ''|| $cedula=== ''|| $edad=== ''|| $correo=== ''|| $telefono=== ''|| $fecha_nacimiento=== ''){
            echo 2;
        }else{
            
         $rta=ClientesFacade::insert( $nombres, $apellidos, $cedula, $edad, $correo, $telefono, $fecha_nacimiento);
         if($rta>0){
             
             echo 1;
         }
            //  echo jason_encode('error');
        }
        
      
return true;
 

  
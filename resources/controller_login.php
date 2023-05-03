<?php
session_start();
    if(!empty($_POST["btningresar"])){
        if(empty($_POST["usuario"]) and empty($_POST["clave"])){
            echo '<div class="alert alert-danger">Los campos están vacios</div>';
        } else{
            $usuario=$_POST["usuario"];
            $clave=$_POST["clave"];
            $sql=$conexion->query(" select * from usuario where usuario='$usuario' and clave='$clave' ");
            if($datos=$sql->fetch_object()){
                $_SESSION["id"]=$datos->id;
                $_SESSION["nombre"]=$datos->nombre;
                $_SESSION["rol"]=$datos->rol;

                if($_SESSION["rol"]=="Alumno"){
                header("location:user.php");
                }
                elseif($_SESSION["rol"]=="Administrador"){
                    header("location:pages/admin.php");
                }
            }else{
                echo '<div class="alert alert-danger">Acceso denegado</div>';
            }
        }
    }
?>
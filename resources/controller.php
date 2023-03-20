<?php
    if(!empty($_POST["btningresar"])){
        if(empty($_POST["usuario"]) and empty($_POST["pass"])){
            echo '<div class="alert alert-danger">Los campos están vacios</div>';
        } else{
            $usuario=$_POST["usuario"];
            $clave=$_POST["pass"];
            $sql=$conexion->query(" select * from usuario where usuario='$usuario' and clave='$clave' ");
            if($datos=$sql->fetch_object()){
                header("location:user.php");
            }else{
                echo '<div class="alert alert-danger">Acceso denegado</div>';
            }
        }
    }
?>
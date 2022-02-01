<?php
    if(trim($_POST['username'])== null|| trim($_POST['password']) == null){
        echo "<script>alert('Por favor diligencia los campos correspondientes')</script>";
        header("Refresh:0 , url =  index.html");
        exit();

    }
    else{
         require_once "./Database/Database.php";
         $usuario = mysqli_real_escape_string($conn,$_POST['username']);
         $password = mysqli_real_escape_string($conn,md5($_POST['password']));
         $sql = "SELECT usu_usuario, usu_password FROM usuario WHERE usu_usuario ='". $usuario ."' and usu_password = '".$password."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query , MYSQLI_ASSOC);
         if(!$result){
             echo "<script>alert('El Usuario o Contraseña es Inválida')</script>";
             header("Refresh:0 , url = logout.php");
             exit();

         }
         else{
             session_start();
             $_SESSION['username'] = $result['usu_usuario'];
             header("Location: list.php");
             session_write_close();
         }
    }
    mysqli_close($conn);
?>
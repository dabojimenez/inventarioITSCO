<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();

    }
    if($_POST['pro_nombre'] != null){
        $nombre=$_POST['pro_nombre'];
        $sql = "SELECT pro_Nombre FROM productos WHERE pro_Nombre ='". $nombre."'";
         $query = mysqli_query($conn,$sql);
         $result = mysqli_fetch_array($query , MYSQLI_ASSOC);
         if($result){
             echo "<script>alert('El producto ingresado ya existe.')</script>";
             header("Refresh:0 , url = ../addlist.php");
             exit();
    
         }
    }else{
        exit();
    }
    
    if($_POST['pro_nombre'] != null && $_POST['pro_cantidad_actual'] != null  && $_POST['pro_precio_base'] != null && $_POST['pro_cantidad_minima'] != null  )
    
    {
        
            $sql = "INSERT INTO productos (pro_Nombre,pro_stockActual,pro_precioBase,pro_stockMinimo,tpr_id) VALUES ('". trim($_POST['pro_nombre']). "','". trim($_POST['pro_cantidad_actual']) . "','" . trim($_POST['pro_precio_base']). "','" . trim($_POST['pro_cantidad_minima']). "','" . trim($_POST['pro_tipo']). "')";
    
    
            if($conn->query($sql)){
                echo $sql;
                echo "<script>alert('Agregado de forma satisfactoria ')</script>";
                header("Refresh:0 , url = ../list.php");
                exit();
    
            }
            else{
                echo $sql;
                echo "<script>alert('no pudo ser agregado')</script>";
                header("Refresh:0 , url = ../list.php");
                exit();
    
            }
         
         

       
    }
    else{
        echo "<script>alert('Porfavor complete la informacion.')</script>";
        header("Refresh:0 , url = ../addlist.php");
        exit();

    }
    mysqli_close($conn);
?>
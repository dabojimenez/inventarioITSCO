<?php
    session_start();
    require_once "../Database/Database.php";
    if($_SESSION['username'] == null){
    echo "<script>alert('Please login.')</script>";
    header("Refresh:0 , url = ../index.html");
    exit();
    }

    if($_POST['pro_id'] != null&& $_POST['cod_tipo'] != null){
       $accion="";
       $detalleaccion="";
        if($_POST['cod_tipo']=='1'){
            $accion="Editar Información";
            $detalleaccion="Actualiza información del producto";
            if($_POST['pro_nombre'] != null && $_POST['pro_cantidad_actual'] != null  && $_POST['pro_precio_base'] != null && $_POST['pro_cantidad_minima'] != null  )
            {
                $sql = "UPDATE productos SET pro_Nombre = '" . trim($_POST['pro_nombre']) . "' ,pro_stockActual = '" .($_POST['pro_cantidad_actual']) .  "' ,pro_precioBase = '" . ($_POST['pro_precio_base']) ."',pro_stockMinimo = '" . ($_POST['pro_cantidad_minima']) ."',tpr_id = '" . ($_POST['pro_tipo']) ."' WHERE pro_id = '" . $_POST['pro_id'] . "'";
            }else{
                echo "<script>alert('Por favor ingrese todos los campos')</script>";
                header("Refresh:0 , url = ../list.php");
                exit(); 
            }
            
        }
        if($_POST['cod_tipo']=='2'){
            $accion="Abastecer producto";
            $detalleaccion="Se agregaron ".($_POST['pro_cantidad_actual'])." producto/s";
            if( $_POST['pro_cantidad_actual'] != null  )
            {
                $sql = "UPDATE productos SET pro_stockActual = pro_stockActual+'" .($_POST['pro_cantidad_actual']) .  "' WHERE pro_id = '" . $_POST['pro_id'] . "'";
            }else{
                echo "<script>alert('Por favor ingrese la cantidad a abastecer')</script>";
                header("Refresh:0 , url = ../list.php");
                exit(); 
            }
        }
        if($_POST['cod_tipo']=='3'){
            $accion="Venta de producto";
            $detalleaccion="Se vendieron ".($_POST['pro_cantidad_actual'])." producto/s";
            if( $_POST['pro_cantidad_actual'] != null  )
            {
                $sql = "UPDATE product SET pro_cantidad_actual = pro_cantidad_actual-'" .($_POST['pro_cantidad_actual']) .  "'   WHERE pro_id = '" . $_POST['pro_id'] . "'";          
            }else{
                echo "<script>alert('Por favor ingrese la cantidad a vender')</script>";
                header("Refresh:0 , url = ../list.php");
                exit(); 
            }
        }
            if($conn->query($sql)){
   
                $sql = "INSERT INTO `log`( `log_accion`, `log_usuario`, `log_producto`, `log_fecha`, `log_cambios`) VALUES ('".$accion."','".$_SESSION['username']."','" . $_POST['pro_id'] . "',now(),'".$detalleaccion."')" ;
                if($conn->query($sql)){
                    echo "<script>alert('Proceso completado exitósamente')</script>";
                    header("Refresh:0 , url =../list.php");
                    exit();
    
                }
                else{
                    //echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
                    header("Refresh:0 , url =../list.php");
                    exit();
    
                }
                header("Refresh:0 , url =../list.php");
                exit();

            }
            else{
                //echo "<script>alert('Inconvenientes para realizar el proceso')</script>";
                header("Refresh:0 , url =../list.php");
                exit();

            }
     
    }
    else{
        echo "<script>alert('Por favor ingrese todos los campos')</script>";
        header("Refresh:0 , url = ../list.php");
        exit();

    }
    mysqli_close($conn);
?>

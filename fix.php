<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT tpr_id as pro_tipo_combo,tpr_descripcion as pro_tipo_descripcion FROM tipoproductos";
$query = mysqli_query($conn, $sql_fetch_todos);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Editar Producto</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

    <link rel="stylesheet" href="./css/style2.css">
</head>
<body>
    <div class="header">
        <h3>Inventario</h3>
        <h3>Actualizar Producto</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1><?php echo $_GET['tipo'] ?></h1>
    
    </div>
  

     
    <div class="fixproduct">
        <form method="POST" action="main/fix.php">
        <div class="form-group">
        <input type="hidden" value="<?php echo $_GET['cod_tipo'] ?>" name="cod_tipo"  class="form-control" />
        <input type="hidden" value="<?php echo $_GET['pro_id'] ?>" name="pro_id"  class="form-control" />
                <label ><h3>ID Producto</h3></label>
                <br>              
                <input type="text" value="<?php echo $_GET['pro_id'] ?>" name="pro_id_ver"  class="form-control" disabled/>
            </div>
            <div class="form-group">
                <label><h3>Nombre del Producto</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_Nombre'] ?>" name="pro_nombre"  class="form-control"/>
            </div>
            <div class="form-group">
                <label><h3>Tipo Producto</h3></label>
                <br>
                 <select name="pro_tipo" >
                 <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { 
                    if( $_GET['pro_tipo']==$row['pro_tipo_descripcion'])
                    {
                        echo  " <option value='".$row['pro_tipo_combo']."' selected>".$row['pro_tipo_descripcion']."</option>";
                    }else{
                        echo  " <option value='".$row['pro_tipo_combo']."'>".$row['pro_tipo_descripcion']."</option>";
                    }
                    $idpro++;
                } ?>
               
                </select>
            </div>

            <div class="form-group">
                <label ><h3>Cantidad Disponible</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_stockActual'] ?>" name="pro_cantidad_actual"  class="form-control"/>
            </div>
            
            <div class="form-group">
                <label ><h3>Precio Base</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_precioBase'] ?>" name="pro_precio_base"  class="form-control"/>
            </div>
            <div class="form-group">
                <label ><h3>Cantidad mínima de stock</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_stockMinimo'] ?>" name="pro_cantidad_minima"  class="form-control"/>
            </div>
            <br>
            <div class="form-button">
                <button type="submit" class="modify" style="float:right">Guardar Cambios</button>
                <a name="" id="" class="return" href="list.php" role="button" style="float:right">Volver</a>
            </div>
        </form>
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>
</html>
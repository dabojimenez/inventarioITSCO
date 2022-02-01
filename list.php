<?php
/*CONEXION A BASE */
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}

$sql_fetch_todos = "SELECT tpr_descripcion,pro_id,pro_Nombre,pro_stockActual,ROUND((pro_precioBase)*0.12,2) as pro_iva ,pro_precioBase,pro_stockMinimo,case when pro_stockActual<= pro_stockMinimo then 'Debe realizar pedido de stock' else ''end as pro_realizar_pedido FROM productos inner join tipoproductos on tipoproductos.tpr_id=productos.tpr_id ORDER BY pro_id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);

?>


<!doctype html>
<html lang="en">

<head>

<title>Estudio de Caso XYZ</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
   <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="header">
        <h3> Inventario</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Control de InventarioZ</h1>
        <h2>Listado de productos</h2>
          </div>
    <div class="table-product">
        <table style="with:100%">
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Tipo Producto</th>
                <th scope="col">Cantidad Disponible</th>               
                <th scope="col">Precio Base</th>  
                <th scope="col">Iva</th>
                <th scope="col">Cantidad minima de stock</th> 
                <th scope="col">Realizar Pedido</th>               
                
                <th scope="col" colspan="4">Acciones</th>
              
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['pro_id'] ?></td>
                        <td><?php echo $row['pro_Nombre'] ?></td>
                        <td><?php echo $row['tpr_descripcion'] ?></td>
                        <td><?php echo $row['pro_stockActual'] ?></td>
                        <td><?php echo $row['pro_precioBase'] ?></td>
                        <td><?php echo $row['pro_iva'] ?></td>
                        <td><?php echo $row['pro_stockMinimo'] ?></td>
                        <td><?php echo $row['pro_realizar_pedido'] ?></td>
                        <td class="modify"><a name="edit" id="" class="bfix" href="fix.php?pro_id=<?php echo $row['pro_id'] ?>&pro_Nombre=<?php echo $row['pro_Nombre'] ?>&pro_stockActual=<?php echo $row['pro_stockActual']; ?>&pro_precioBase=<?php echo $row['pro_precioBase'] ?>&pro_stockMinimo=<?php echo $row['pro_stockMinimo'] ?>&tipo=<?php echo 'Edición de productos' ?> &cod_tipo=<?php echo 1 ?>&pro_tipo=<?php echo $row['tpr_descripcion'] ?> " role="button">
                        Editar
                            </a></td>
                            
                            <td class="modify"><a name="abastecer" id="" class="bfix" href="AbaVentProducto.php?pro_id=<?php echo $row['pro_id'] ?>&pro_Nombre=<?php echo $row['pro_Nombre'] ?>&pro_stockActual=<?php echo $row['pro_stockActual']; ?>&pro_precioBase=<?php echo $row['pro_precioBase'] ?>&pro_stockMinimo=<?php echo $row['pro_stockMinimo'] ?>&tipo=<?php echo 'Abastecimiento de productos' ?> &cod_tipo=<?php echo 2 ?>&descripcion=<?php echo "Por favor ingrese la cantidad de producto a abastecer (Se agregara la cantidad ingresada al stock actual)" ?>&pro_tipo=<?php echo $row['tipo_descripcion'] ?>  " role="button">
                            Abastecer
                            </a></td>
                            <td class="modify"><a name="vender" id="" class="bfix" href="AbaVentProducto.php?pro_id=<?php echo $row['pro_id'] ?>&pro_nombre=<?php echo $row['pro_nombre'] ?>&pro_cantidad_actual=<?php echo $row['pro_cantidad_actual']; ?>&pro_precio_base=<?php echo $row['pro_precio_base'] ?>&pro_cantidad_minima=<?php echo $row['pro_cantidad_minima'] ?>&tipo=<?php echo 'Venta de productos' ?> &cod_tipo=<?php echo 3 ?>&descripcion=<?php echo "Por favor ingrese la cantidad de producto a vender (Disminuira la cantidad ingresada al stock actual)" ?>&pro_tipo=<?php echo $row['tipo_descripcion'] ?>  " role="button">
                                Vender
                            </a></td>
                        <td class="delete"><a name="id" id="" class="bdelete" href="main/delete.php?pro_id=<?php echo $row['pro_id'] ?>" role="button">
                                Eliminar
                            </a></td>
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
        <a name="" id="" class="Addlist" style="float:left" href="addlist.php" role="button">Agregar Producto</a>
        <a name="" id="" class="Fac" style="float:left" href="log.php" role="button">Información estadistica</a>
     
    
    </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>
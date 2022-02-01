<?php
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}
$username = $_SESSION['username'];
$sql_fetch_todos = "SELECT pro_id,pro_nombre,pro_cantidad_actual,ROUND((pro_precio_base)*0.12,2) as pro_iva ,pro_precio_base,pro_cantidad_minima,case when pro_cantidad_actual<= pro_cantidad_minima then 'Debe realizar pedido de stock' else ''end as pro_realizar_pedido FROM product ORDER BY pro_id ASC";
$query = mysqli_query($conn, $sql_fetch_todos);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Editar Producto</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: url(d.jpeg) ;
        }

        /*Barra superior*/
        .header {
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 50px;
            padding: 5px 13px 11px 0px;
            width: 100%;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: rgb(3, 75, 30);
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }

        /*cerrar sesion*/

        .button-logout {
            position: relative;
            margin-top: -50px;
            margin-right: 20px;
            float: right;
            text-decoration: none;
            border: transparent;
            border-radius: 15px;
            background-color: #000000;
            padding: 10px 10px 10px 10px;
            color: white;
            transition: 0.5s;
        }
        .button-logout:hover {
            background-color: #258645;
            color: white;
        }

        

        .container {
            margin: 90px auto;
            margin-bottom: 50px;
            border-radius: 30px;
            text-align: center;
            background-color: white;
            width: 40%;
            padding-bottom: 10px;
        }

            
        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 0px 10px 0px;
        }

        table {
            width: 100%;
        }

        th {
            color: white;
            background-color: rgb(3, 75, 30);
        }

        tr {
            background-color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .timeregis {
            text-align: center;
        }
        .form-group{
            margin-left: 600px;
        }
        [type=text]{
            font-family: "Mitr", sans-serif;
            border-radius: 15px;
            border: black;
            padding: 7px 100px 7px 5px;

            border: 3px solid BLACK;
            border-radius: 10px;
            margin: 10px auto;
        }
        /*boton volver*/

        .return{
            border-radius: 15px;
            background-color: #00A600;
            color: white;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;
        }
        .return:hover{
            color: black;
            background-color: #BBFFBB;
        }
        .modify{
            border-radius: 15px;
            border: transparent;
            color: white;
            padding: 4px 40px 4px 40px;
            margin: 0px 50px 50px 100px;
            font-size: 20px;
            border-collapse: collapse;
            background-color: #00A600;
            font-family: "Mitr", sans-serif;
            transition: 0.5s;
        }
        .modify:hover{
            color: black;
            background-color: #BBFFBB;
        }
    </style>
</head>
<body>
    <div class="header">
        <h3>Inventario</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1><?php echo $_GET['tipo'] ?></h1>
        <h4><?php echo $_GET['descripcion'] ?></h4>
    </div>
    <!--<div class="table-product">
    <table style="with:100%">
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad Disponible</th>               
                <th scope="col">Precio Base</th>  
                <th scope="col">Iva</th>
                <th scope="col">Cantidad minima de stock</th> 
                <th scope="col">Realizar Pedido</th>               
                
              
              
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['pro_id'] ?></td>
                        <td><?php echo $row['pro_nombre'] ?></td>
                        <td><?php echo $row['pro_cantidad_actual'] ?></td>
                        <td><?php echo $row['pro_precio_base'] ?></td>
                        <td><?php echo $row['pro_iva'] ?></td>
                        <td><?php echo $row['pro_cantidad_minima'] ?></td>
                        <td><?php echo $row['pro_realizar_pedido'] ?></td>
                       
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
    </div>-->

     
    <div class="fixproduct">
        <form method="POST" action="main/fix.php">
        <div class="form-group">
        <input type="hidden" value="<?php echo $_GET['cod_tipo'] ?>" name="cod_tipo"  class="form-control" />
        <input type="hidden" value="<?php echo $_GET['pro_id'] ?>" name="pro_id"  class="form-control" />
                <label ><h3>Id Producto</h3></label>
                <br>              
                <input type="text" value="<?php echo $_GET['pro_id'] ?>" name="pro_id_ver"  class="form-control" disabled />
            </div>
            <div class="form-group">
                <label><h3>Nombre del Producto</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_Nombre'] ?>" name="pro_nombre"  class="form-control" disabled/>
            </div>
            <div class="form-group">
                <label><h3>Tipo de Producto</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_tipo'] ?>" name="pro_tipo"  class="form-control" disabled/>
            </div>
            <div class="form-group">
                <label ><h3>Cantidad de producto</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_stockActual'] ?>" name="pro_cantidad_actual"  class="form-control"/>
            </div>
            
            <div class="form-group">
                <label ><h3>Precio Base</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_precioBase'] ?>" name="pro_precio_base"  class="form-control" disabled/>
            </div>
            <div class="form-group">
                <label ><h3>Cantidad mínima de stock</h3></label>
                <br>
                <input type="text" value="<?php echo $_GET['pro_stockMinimo'] ?>" name="pro_cantidad_minima"  class="form-control" disabled/>
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
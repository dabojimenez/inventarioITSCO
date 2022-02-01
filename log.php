<?php
/*CONEXION A BASE */
session_start();
require_once "Database/Database.php";
if ($_SESSION['username'] == null) {
    echo "<script>alert('Please login.');</script>";
    header("Refresh:0 , url=index.html");
    exit();
}

$sql_fetch_todos = "SELECT log_id, log_accion, log_usuario, pro_nombre, log_fecha, log_cambios FROM log inner join product on log_producto=pro_id ";
$query = mysqli_query($conn, $sql_fetch_todos);

?>


<!doctype html>
<html lang="en">

<head>

<title>Estudio de Caso XYZ</title>
    
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
            color: rgb(224, 224, 224);
            font-family: Arial, Helvetica, sans-serif;
            margin-top: 0px;
            bottom: 0;
            background-color: rgb(3, 75, 30);
        }
        .header p {
            margin-left: 20px;
            text-align: left;
        }
        /*Boton Cerrar Cesion*/
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
            color: White;
        }

        /*contenedor del titulo*/
        .container {
            margin: 70px auto;
            margin-bottom: 10px;
            border-radius: 10px;
            text-align: center;
            background-color: White;
            width: 30%;
            padding-bottom: 5px;
        }

        /*Tablas*/
        table th,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px 10px 20px 10px;
        }
        table {
            width: 100%;
        }
        th {
            color: white;
            background-color: rgb(3, 75, 30);
        }
        /*color de registros */
        tr {
            background-color: white;
        }
        tr:nth-child(even) {
            background-color: #9c9c9c;
        }

        /*Editar textura*/
        .modify .bfix {
            border-radius: 15px;
            background-color: #ffcc33;
            color: black;
            text-decoration: none;
            padding: 4px 20px 4px 20px;
            transition: 0.5s;
        }
        .modify .bfix:hover {
            background-color: #fdb515;
            color: white;
        }

        .return {
            border-radius: 25px;
            background-color: #00A600;
            color: white;
            text-decoration: none;
            padding: 4px 40px 4px 40px;
            margin: 0px 0px 50px 100px;
            font-size: 20px;
            transition: 0.5s;

        }

        .return:hover {
            background-color: black ;
            color: white;
        }
         
        



    </style>
</head>
<body>
    <div class="header">
        <h3> Instituto Tecnologico Superior Cordillera - Diseño WEB</h3>
        <a name="" id="" class="button-logout" href="logout.php" role="button">Cerrar Sesión</a>
    </div>
    <div class="container">
        <h1>Información de actividades</h1>
          </div>
    <div class="table-product">
        <table style="with:100%">
            <tr>
                <th scope="col">Orden</th>
                <th scope="col">ID Registro</th>
                <th scope="col">Acción realizada</th>
                <th scope="col">Usuario</th>
                <th scope="col">Producto afectado</th>               
                <th scope="col">Fecha</th>  
                <th scope="col">Cambios</th>
                            
                
                
              
            </tr>
            <tbody>
                <?php
                $idpro = 1;
                while ($row = mysqli_fetch_array($query)) { ?>
                    <tr>
                        <td scope="row"><?php echo $idpro ?></td>
                        <td><?php echo $row['log_id'] ?></td>
                        <td><?php echo $row['log_accion'] ?></td>
                        <td><?php echo $row['log_usuario'] ?></td>
                        <td><?php echo $row['pro_nombre'] ?></td>
                        <td><?php echo $row['log_fecha'] ?></td>
                        <td><?php echo $row['log_cambios'] ?></td>
                     
                        
                    </tr>
                <?php
                    $idpro++;
                } ?>
            </tbody>
        </table>
        <br>
      
     
    
    </div>
    <div class="form-button">
    <a name="" id="" class="return" href="list.php" role="button" style="float:right">Volver</a>
           
            </div>
    <?php
    mysqli_close($conn);
    ?>
</body>

</html>
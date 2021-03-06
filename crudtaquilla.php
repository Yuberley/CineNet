<?php
 	 include("conexion_db.php");
   include("boostraplink.php");
 	 include("header.php");
    $conectar = conectar();
  	 $peliculas = "select * from taquilla";
  	 $result = $conectar->query($peliculas);
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <title>CineNet Software</title>
    <meta charset="UTF-8">
    <link rel="icon" type="imagen/png" href="img/icono.png" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


   </head>
   <body>
   <div class="container text-center py-1">
  <div class="btn-group" role="group"  aria-label="First group">
   <a href="crudpelicula.php" type="button" class="btn btn-secondary">Peliculas</a> 
   <a href="crudsala.php" type="button" class="btn btn-secondary">Salas</a> 
   <a href="crudusuario.php" type="button" class="btn btn-secondary">Usuarios</a> 
   <a href="crudreparto.php" type="button" class="btn btn-secondary">Reparto</a> 
   <a href="crudtiene.php" type="button" class="btn btn-secondary">Tiene</a> 
   <a href="crudcartelera.php" type="button" class="btn btn-secondary">Cartelera</a> 
   <a href="crudtaquilla.php" type="button" class="btn btn-info">Taquilla</a> 
   <a href="crudempleados.php" type="button" class="btn btn-secondary">Empleados</a> 
    <a href="crudtiquete.php" type="button" class="btn btn-secondary">Tiquete</a> 
    <a href="crudeventos.php" type="button" class="btn btn-secondary">Eventos</a> 
  </div>
  </div>
      <div class="container-fluid p-4">
         <div class="row">
            <div class="col-md-4">
                <?php if (isset($_SESSION['message'])) { ?>
      				<div class="alert alert-<?= $_SESSION['message_type']?>" role="alert">
      				  	<?= $_SESSION['message']?>
      				  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        				  	<span aria-hidden="true">&times;</span>
      				 	 </button>
     					 </div>
    				  <?php session_unset(); } ?>




               <div class="card card-body">
                  <form action="ingresartaquilla.php" method="POST">
                  <div class="col-md-12">
                     <h1 class="text-center" mt-4 >Agregar taquilla</h1>
                  </div>
                     <div class="form-group">
                        <input type="text" name="cod_taquilla" class="form-control" placeholder="Codigo" autofocus>
                     </div>   
                      <div class="form-group">
                        <input type="text" name="tipo_taquilla" class="form-control" placeholder="tipo de taquilla" autofocus>
                     </div>  
                     <input type="submit" name="guardar_taquilla" class="btn btn-success btn-block" value="Guardar">
                  </form>
               </div>
            </div>  

            <div class="col-md-8" style="margin-top: 30px">

             
               <div class="col-md-12">
                  <h1 class="text-center" mt-4 >Lista de Taquillas</h1>
               </div>
               <div class="col-md-12 ">
                  <table class="table table-striped table-hover">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">Codigo</th>
                           <th scope="col">tipo de taquilla</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach($result as $filas){?> 
                              <tr>
                              <td><?php echo $filas['cod_taquilla'] ?></td>
                              <td><?php echo $filas['tipo_taquilla'] ?></td>
                              <td>

                              <a href="editartaquilla.php?id=<?php echo $filas['cod_taquilla'] ?>" class="btn btn-primary">Editar</a>
                              <a href="eliminartaquilla.php?id=<?php echo $filas['cod_taquilla'] ?>" class="btn btn-danger">Eliminar</a>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>

   </body>
   <?php
        include("footer.php");
    ?>
</html>
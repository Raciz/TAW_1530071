<?php
  include_once('funciones.php'); //incluir el archivo funciones
  
  $user = mostrarBas(); //ejecutar la funcion que trae todos los registros de la tabla basquetbolistas
  $total_users = count(mostrarBas()); //cuenta el total de registros devuelto por la consulta
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 6 |  Ejercicio 2</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Basquetbolistas</h3>
          <p><a href="agregarBas.php" class="button radius tiny secondary">Agregar nuevo</a></p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Posición</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th width="250">Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $user as $users ){ ?>
                  <tr>
                    <td><?php echo $users[0] ?></td>
                    <td><?php echo $users[1] ?></td>
                    <td><?php echo $users[2] ?></td>
                    <td><?php echo $users[3] ?></td>
                    <td><?php echo $users[4] ?></td>
                    <td><a href="./modificarBas.php?id=<?php echo $users[0]; ?>" class="button radius tiny secondary">Modificar</a>
                    <button onclick="confirmar(<?php echo $users[0]; ?>);" class="button radius tiny secondary">Eliminar</button>
                    </td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>
    <!-- función para confirmar la eliminación del registro -->
    <script type="text/javascript">
      function confirmar(id){
        var r = confirm('¿Está seguro de querer eliminar este registro?');
        if(r){
           window.location.href='eliminarBas.php?id='+id; //se redirecciona al archivo de eliminar.php
        }else{
          window.location.href='main_bas.php'; 
        }
      }
    </script>
    <?php require_once('footer.php'); ?>
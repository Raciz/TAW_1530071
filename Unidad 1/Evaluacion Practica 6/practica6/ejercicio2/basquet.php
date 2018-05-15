<!--Archivo para mostrar cada basquetbolista registrado-->
<br>
<div class="row column">
  <h3 style="display: inline-block;">Basquetbolistas</h3>
  <a href="agregarb.php" class="button tiny" style="margin-left: 50px;">Agregar</a>
  <table width="100%">
    <!--Creando la tabla de basquetbolistas-->
    <thead>
      <tr>
        <th width="30">ID</th>
        <th width="350">Nombre</th>
        <th width="150">Equipo</th>
        <th width="100">Carrera</th>
        <th width="300">Email</th>
        <th>Accion</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      //Se prepara la sentencia sql para consultar los basquetbolistas
      $sql = 'SELECT * FROM basquetbolista';
      //se extraen todos los registros mediante un foreach ejecutando la sentencia sql
      foreach ($pdo->query($sql) as $row) {
      ?>
      <tr>
        <!--Se imprime cada campo del registro-->
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['equipo']; ?></td>
        <td><?php echo $row['carrera']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td>
          <a href="./updateb.php?id=<?php echo $row['id']; ?>" class="button radius tiny info" style="display: inline-block; float: left;">Modificar</a>
          <a onclick="validar()"  class="button radius tiny" style="display: inline-block; background-color: #dd5044;">Eliminar</a>
          <button onclick=""></button>
        </td>
      </tr>
      <?php } ?><!--Cierre del script php-->
    </tbody>
  </table>
  <script>
    //funcion para validar la decision del boton eliminar
    function validar(){
        //se atrapa la respuesta del mensaje de confirmacion en una variable (True o False)
        var r = confirm("Estas seguro de eliminar este basquetbolista?");
        //se evalua la respuesta
        if (r == true) {
          //Si es verdadera se redirecciona a el archivo para eliminar un registro y se pasa el id a eliminar en forma de parametro get mediante la URL
          window.location.href = "deleteb.php?id=<?php echo $row['id']; ?>";
        } else {
          //En caso de ser falsa se muestra un mensaje de estado
          alert('No se han guardado cambios.');
          //Se redirecciona a la pagina principal
          window.location.href = 'index.php';
        }
    }
  </script>
</div>
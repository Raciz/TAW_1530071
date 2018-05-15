<!--Archivo con la tabla para mostrar los usuarios-->
<div class="row column">
  <h3>Usuarios</h3>
  <table width="100%">
    <!--Creando la tabla-->
    <thead>
      <tr>
        <th width="30">ID</th>
        <th width="200">Email</th>
        <th width="300">Contraseña</th>
        <th width="250">Status ID</th>
        <th width="250">Tipo ID</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      //query para consultar los usuarios
      $sql = 'SELECT * FROM user';
      //se extrae cada registro mediante un foreach
      foreach ($pdo->query($sql) as $row) {
      ?>
      <tr>
        <!--se imprime cada campo del registro-->
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['password']; ?></td>
        <td><?php echo $row['status_id']; ?></td>
        <td><?php echo $row['user_type_id']; ?></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
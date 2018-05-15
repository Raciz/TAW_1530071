<!--Archivo encagrado de mostrar los tipos de usuarios-->
<div class="row column">
  <h3>Tipos</h3>
  <table width="100%">
    <!--Creaando la tabla para mostrar los tipos-->
    <thead>
      <tr>
        <th>ID</th>
        <th>nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        //query para consultar los tipos en la base de datos
        $sql = 'SELECT * FROM user_type';
        //se extrae cada registro de la consulta mediante un foreach
        foreach ($pdo->query($sql) as $row) {
       ?>
        <tr>
          <!--Se imprime cada campo del registro-->
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
        </tr>
       <?php }?>
    </tbody>
  </table>
</div>
<!--Archivo encagrado de mostrar los estatus-->
<div class="row column">
  <h3>Estatus</h3>
  <table width="100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        //query para la consulta de los estatus en la bd
        $sql = 'SELECT * FROM status';
        //se extrae cada registro del pdo mediante un foreach
        foreach ($pdo->query($sql) as $row) {
       ?>
        <tr>
          <!--se imprime cada uno de los campos de cada registro-->
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
        </tr>
       <?php }?>
    </tbody>
  </table>
</div>
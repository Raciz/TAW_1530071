<!--Archivo encagrado de mostrar los accesos-->
<div class="row column">
  <h3>Accesos</h3>
  <table width="100%">
    <!--estructuracion de los accesos en una tabla-->
    <thead>
      <tr>
        <th>ID</th>
        <th>Fecha de loggeo</th>
        <th>ID de usuario</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        //en esta partese leen los accesos de la tabla user_log y mediante un ciclo foreach se extrae cada registro
        $sql = 'SELECT * FROM user_log';
        foreach ($pdo->query($sql) as $row) {
       ?>
        <tr>
          <!--en esta parte se imprime cada uno de los datos extraidos en cada iteracion del ciclo-->
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['date_logged_in']; ?></td>
          <td><?php echo $row['user_id']; ?></td>
        </tr>
       <?php }?>
    </tbody>
  </table>
</div>
<!--Archivo para mostrar los totales-->
<div class="row column">
  <div class="callout success">
    <h3>Totales</h3>
  </div>
  <table width="100%">
    <thead>
      <!--Creando la tabla-->
      <tr>
        <th>Usuarios</th>
        <th>Tipos</th>
        <th>Status</th>
        <th>Accesos</th>
        <th>Usuarios Activos</th>
        <th>Usuarios Inactivos</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <!--Se imprime cada uno de los totales de las tablas mediante funciones de php-->
        <td><?php echo totalUsuarios(); ?></td>
        <td><?php echo totalTipos(); ?></td>
        <td><?php echo totalStatus(); ?></td>
        <td><?php echo totalAccesos(); ?></td>
        <td><?php echo totalActivos(); ?></td>
        <td><?php echo totalInactivos(); ?></td>
      </tr>
    </tbody>
  </table>
</div>
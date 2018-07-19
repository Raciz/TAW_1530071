<?php
//verificamos si el usuario ya ha iniciado session
if(!isset($_SESSION["nombre"]))
{
    //si no ha iniciado sesion, lo redirigimos al login
    echo "<script>
            window.location.replace('index.php');
          </script>";
}
?>

<div class="container">
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-sm-12">
            <h4 class="m-t-0 header-title">Student data</h4>
            <div class="clearfix">
                <?php
                $info = new mvcTeacher();
                $info -> dataAlumnoController();
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div style="border-top: 20px solid #126C4A; margin-left: -15px; margin-right: -15px;"></div>
        <div class="col-sm-12" style="margin-top: 20px">
            <h4 class="m-t-0 header-title">CAI record</h4>
            <div class="table-responsive m-b-20">
                <table id="example1" class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Beginning hour</th>
                            <th>Ending hour</th>
                            <th>Activity</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='fondoTabla'>
                            <td>17/August/2018</td>
                            <td>9:45 am</td>
                            <td>1:55 pm</td>
                            <td>Book</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end container -->
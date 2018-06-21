<!-- Full Width Column -->
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Festival 2018
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario de Envio de Comprobantes</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" enctype="multipart/form-data">
                            <div class="box-body">

                                <div class="form-group">
                                    <label>Grupo</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Seleccione Grupo</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Alumno</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Seleccione Alumno</option>
                                    </select>
                                </div>

                                <label>Nombre de la Madre</label>
                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label>Nombre</label>
                                        <input type="text" class="form-control" placeholder="Nombre de la Madre">
                                    </div>

                                    <div class="form-group col-xs-6">
                                        <label>Apellido</label>
                                        <input type="text" class="form-control" placeholder="Apellido de la Madre">
                                    </div>
                                </div>

                                <!--Date-->
                                <div class="form-group">
                                    <label>Fecha de Pago</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group">
                                    <label>Imagen (tamaño maximo: 300 KB)</label>
                                    <input type="file" name="img" accept="image/jpeg, image/png">
                                </div>

                                <div class="form-group">
                                    <label>Folio</label>
                                    <input type="number" class="form-control" placeholder="Folio">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <center>
                                    <button type="reset" class="btn btn-danger btn-lg btn-flat">Limpiar</button>
                                    <button type="submit" class="btn btn-primary btn-lg btn-flat">Enviar</button>
                                </center>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col (left) -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.container -->
<?php
//session_start();
include "../config.php";
include "../funciones.php";
include "../acceso.php";
if($VP_perfil=="Admin") {
?>

<section class="content-header">
    <h1>
    	Registro de Afiliados
  	</h1>
    <ol class="breadcrumb">
        <li>Astrea Funeraria La Fe</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
                        <!-- left column -->
                        <div class="col-md-9">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h1 class="box-title">Datos Personales</h1>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label >No. de Identificación</label>
                                            <input type="text" class="form-control" id="ident" name="ident" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Tipo de Identificación</label>
                                            <input type="text" class="form-control" id="tipoIdent" name="tipoIdent" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Lugar de Expedición</label>
                                            <input type="text" class="form-control" id="lugarExp" name="lugarExp" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Nombres</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Primer Apellido</label>
                                            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Segundo Apellido</label>
                                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask/>
                                        </div>
                                        <div class="form-group">
                                            <label >Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Celular</label>
                                            <input type="text" class="form-control" id="celular" name="celular" placeholder=""/>
                                        </div>
                                        <div class="form-group">
                                            <label >Correo electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder=""/>
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" onclick="loadContentP('form_action','propietario/form_propietario_insertar.php','Cedula='+devuelveValor('Cedula')+'&LugarExp='+devuelveValor('LugarExp')+'&Nombres='+devuelveValor('Nombres')+'&Apellidos='+devuelveValor('Apellidos')+'&Telefono='+devuelveValor('Telefono')+'&Celular='+devuelveValor('Celular')+'&Direccion='+devuelveValor('Direccion')+'&Mail='+devuelveValor('Mail')+'&Usuario='+devuelveValor('Usuario')+'&Clave='+devuelveValor('Clave')+'&Perfil='+devuelveValor('Perfil'));setValue('Cedula',''); setValue('LugarExp',''); setValue('Nombres','');setValue('Apellidos','');setValue('Telefono','');setValue('Celular','');setValue('Direccion','');setValue('Mail','');setValue('Usuario','');setValue('Clave','');setValue('Perfil','');" class="btn btn-primary">Registrar</button>
                                    </div>
                                </form>
                                <div style="clear:both" id="form_action"></div>
                            </div><!-- /.box -->
                        </div>
    </div>
</section>

<?php
} else {
?>
<script type="text/javascript">
location.href='index.php';
</script>
<?php 
}
?>
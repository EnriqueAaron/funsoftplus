<?php
//session_start();
include "../config.php";
include "../funciones.php";
include "../acceso.php";
if($VP_perfil=="Admin") {
?>

<script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                                'Last 7 Days': [moment().subtract('days', 6), moment()],
                                'Last 30 Days': [moment().subtract('days', 29), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                            },
                            startDate: moment().subtract('days', 29),
                            endDate: moment()
                        },
                function(start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal',
                    radioClass: 'iradio_minimal'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-red',
                    radioClass: 'iradio_flat-red'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>

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
                        <div class="col-md-12">
                            <div class="box box-solid">

                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Datos Personales</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Registro de Beneficiarios</a></li>
                                    
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                    <form role="form">
                                     <div class="row">
                                        <div class="col-xs-5">
                                            <label>No. de Identificación</label>
                                            <input type="text" class="form-control" id="ident" name="ident" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label>Tipo de Identificación</label>
                                            <input type="text" class="form-control" id="tipoIdent" name="tipoIdent" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="row">





                                        <div class="col-xs-5">
                                            <label>Lugar de Expedición</label>
                                            <input type="text" class="form-control" id="lugarExp" name="lugarExp" placeholder=""/>
                                        </div>
                                    </div>
                                    <br /><br />
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label >Nombres</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Primer Apellido</label>
                                            <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Segundo Apellido</label>
                                            <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Fecha de Nacimiento</label>
                                            <input type="text" class="form-control" name="fechaNac" id="fechaNac" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder=""/>
                                        </div>
                                        
                                        <?php
                                        $sql = "select codigoCiudad, nombreCiudad from ciudades order by nombreCiudad";
                                        $res = ejecutarSQL($sql);
                                        $arreglo_php = array();
                                        if(($res->num_rows)==0)
                                           array_push($arreglo_php, "No hay datos");
                                        else{
                                          while($palabras = mysqli_fetch_array($res)){
                                            array_push($arreglo_php, $palabras["nombreCiudad"]);
                                          }
}
                                        ?>
                                        <script type="text/javascript">
                                          $(function(){
                                            var autocompletar = new Array();
                                            <?php //Esto es un poco de php para obtener lo que necesitamos
                                             for($p = 0;$p < count($arreglo_php); $p++){ //usamos count para saber cuantos elementos hay ?>
                                               autocompletar.push('<?php echo $arreglo_php[$p]; ?>');
                                             <?php } ?>
                                             $("#ciudad").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
                                               source: autocompletar //Le decimos que nuestra fuente es el arreglo
                                             });
                                          });
                                        </script>
                                        <div class="col-xs-5">
                                            <label >Ciudad de domicilio</label>
                                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Celular</label>
                                            <input type="text" class="form-control" id="celular" name="celular" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label >Correo electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder=""/>
                                        </div>
                                    </div>
                                    <br /><br />
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder=""/>
                                        </div>
                                        <div class="col-xs-5">
                                            <label>Contraseña</label>
                                            <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder=""/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-5">
                                            <label>Perfil</label>
                                            <input type="text" hidden value="2" id="perfil" name="perfil">
                                            <input type="text" disabled="disabled" class="form-control" value="Afiliado"/>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="box-footer">
                                        <button type="button" onclick="loadContentR('form_action','afiliados/formAfiliadosInsertar.php',
                                        'ident='+devuelveValor('ident')+'&tipoIdent='+devuelveValor('tipoIdent')
                                        +'&lugarExp='+devuelveValor('lugarExp')+'&nombre='+devuelveValor('nombre')
                                        +'&apellido1='+devuelveValor('apellido1')+'&apellido2='+devuelveValor('apellido2')
                                        +'&fechaNac='+devuelveValor('fechaNac')+'&telefono='+devuelveValor('telefono')
                                        +'&celular='+devuelveValor('celular')+'&direccion='+devuelveValor('direccion')+'&ciudad='+devuelveValor('ciudad')
                                        +'&email='+devuelveValor('email')+'&usuario='+devuelveValor('usuario')
                                        +'&contrasena='+devuelveValor('contrasena')+'&perfil='+devuelveValor('perfil'));setValue('ident',''); 
                                        setValue('lugarExp',''); setValue('nombre','');setValue('apellido1','');setValue('telefono','');
                                        setValue('celular','');setValue('direccion','');setValue('email','');setValue('usuario','');
                                        setValue('contrasena','');setValue('perfil','');" class="btn btn-primary">Registrar</button>
                                        <div style="clear:both" id="form_action"></div>
                                    </div>
                                </form>
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                    <form role="form">
                                     
                                    <br />
                                    <div class="box-footer">
                                        <button type="submit" onclick="" class="btn btn-primary">Registrar</button>
                                    </div>
                                    </form>
                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div><!-- nav-tabs-custom -->
                            
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        
                    
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
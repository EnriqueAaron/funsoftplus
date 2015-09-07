<?php
session_start();
include "../config.php";
include "../funciones.php";
//include "../acceso.php";
//if($VP_Perfil=="Admin") {
?>
<a href="#" onclick="loadContentP('window_action','propietario/consultar_propietarios.php','');">Consultar Propietarios</a>
<div id="cont_propietarios" style="width:365px; height:310px; float:right; position:absolute; top:99px; left:490px; right:0px; overflow:auto">
</div>
 <br /><br /> 
<fieldset style="height:330px;">
<legend>Registro de Afiliados</legend>
<label><b>Datos Personales</b></label>
<br /> <br /> 
<div class="contenedor_input"><!-- CONTENEDOR-->
 <label class="label_izquierdo">Identificación</label>
    <input class="input_izquierdo" type="text" name="Cedula" id="Cedula" onkeyup="valNumeroCed(this);" value="" size="32" />
    <br /><br />
    <label class="label_izquierdo">Lugar Expedici&oacute;n</label>
    <input class="input_izquierdo" type="text" name="LugarExp" id="LugarExp" onkeyup="valLetraLE(this);" value="" size="32" />
    <label class="label_derecho">Tipo de identificacion</label>
    <input class="input_derecho" type="text" name="Apellidos" id="Apellidos" onkeyup="valLetraApellidos(this);" value="" size="32" />
     <br/> <br/>
    <label class="label_izquierdo">Nombres</label>
    <input class="input_izquierdo" type="text" name="Nombres" id="Nombres" onkeyup="valLetraNombres(this);" value="" size="32" />
    <label class="label_derecho">Apellidos</label>
    <input class="input_derecho" type="text" name="Apellidos" id="Apellidos" onkeyup="valLetraApellidos(this);" value="" size="32" />
    <br/> <br/> 
    <label class="label_izquierdo">Telefono</label>
    <input class="input_izquierdo" type="text" name="Telefono" id="Telefono" onkeyup="valNumeroTel(this);" maxlength="10" value="" size="32" />
    <label class="label_derecho">Celular</label>
    <input class="input_derecho" type="text" name="Celular" id="Celular" onkeyup="valNumeroCel(this);" maxlength="10" value="" size="32" />
    <br/> <br/> 
    <label class="label_izquierdo">Dirección</label>
    <input class="input_izquierdo" type="text" name="Direccion" id="Direccion" onkeyup="" value="" size="32" />
    <label class="label_derecho">E - Mail</label>
    <input class="input_derecho" type="text" name="Mail" id="Mail" onkeyup="" value="" size="32" /><br /> <br /> 
    <br /><br />
    <label class="label_izquierdo">Usuario</label>
    <input class="input_izquierdo" type="text" name="Usuario" id="Usuario" onkeyup="valLetraUsuario(this);" value="" size="32" />
    <br /> <br /> 
    <label class="label_izquierdo">Contraseña</label>
    <input class="input_izquierdo" type="password" name="Clave" id="Clave" onkeyup="" value="" size="32" />
    <br/> <br/> 
    <label class="label_izquierdo">Perfil</label>
     <select name="Perfil" id="Perfil" onchange="">
        <option value="--">Seleccione</option>
         <?php
		$query="SELECT * FROM `perfil`";
		$valueOpt="IdPerfil";
		$valueShowOpt="Perfil";	
		cargarSelect($query, $valueOpt, $valueShowOpt, ".", ".")
		?>
    </select>
    <br /><br />
    <input class="input_izquierdo" type="button" value="Guardar"   onclick=" if(initValue('Cedula,LugarExp,Nombres,Apellidos,Telefono,Celular,Direccion,Mail,Usuario,Clave,Perfil')==true) {
if(validarEmail('Mail')==false){alert('La direcci&oacute;n de correo no es correcta!');}  
else{ if(valMinimoCaracteresCed('Cedula')==false){alert('El Campo Cedula debe tener minimo siete Caracteres');}
else{ if(valMinimoCaracteres('Usuario')==false){alert('El Campo Usuario debe tener minimo seis Caracteres');}
else{ if(valMinimoCaracteres('Clave')==false){alert('El Campo Contraseña debe tener minimo seis Caracteres');}
else{ 
loadContentP('form_action','propietario/form_propietario_insertar.php','Cedula='+devuelveValor('Cedula')+'&LugarExp='+devuelveValor('LugarExp')+'&Nombres='+devuelveValor('Nombres')+'&Apellidos='+devuelveValor('Apellidos')+'&Telefono='+devuelveValor('Telefono')+'&Celular='+devuelveValor('Celular')+'&Direccion='+devuelveValor('Direccion')+'&Mail='+devuelveValor('Mail')+'&Usuario='+devuelveValor('Usuario')+'&Clave='+devuelveValor('Clave')+'&Perfil='+devuelveValor('Perfil'));setValue('Cedula',''); setValue('LugarExp',''); setValue('Nombres','');setValue('Apellidos','');setValue('Telefono','');setValue('Celular','');setValue('Direccion','');setValue('Mail','');setValue('Usuario','');setValue('Clave','');setValue('Perfil','');}}}}} else { alert('Todos los Campos son Obligatorios'); }" size="32" />
    <input class="input_izquierdo" type="button" value="Cancelar" onclick="setValue('Cedula',''); setValue('LugarExp','');setValue('Nombres','');setValue('Apellidos','');setValue('Telefono','');setValue('Celular','');setValue('Direccion','');setValue('Mail','');setValue('Usuario','');setValue('Clave','');setValue('Perfil','');" size="32" />
    <br /><br />
</div>

<!-- FIN CONTENEDOR-->
<div style="clear:both" id="form_action"></div>
</fieldset>
<?php
/*
} else {
?>
<script type="text/javascript">
location.href='index.php';
</script>
<?php 
}*/
?>
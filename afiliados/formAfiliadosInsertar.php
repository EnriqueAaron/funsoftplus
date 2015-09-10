<?php
//session_start();
include "../config.php";
include "../funciones.php";
include "../acceso.php";
if ($VP_perfil=="Admin"){
	$cedula=$_POST["ident"];
	$tipoIdent=$_POST["tipoIdent"];
	$lugarExp=$_POST["lugarExp"];
	$nombre=$_POST["nombre"];
	$apellido1=$_POST["apellido1"];
	$apellido2=$_POST["apellido2"];
	$fechaNac=$_POST["fechaNac"];
	$telefono=$_POST["telefono"];
	$celular=$_POST["celular"];
	$direccion=$_POST["direccion"];
	$ciudad=$_POST["ciudad"];
	$email=$_POST["email"];
	$usuario=$_POST["usuario"];
	$contrasena=$_POST["contrasena"];
	$contrasena=md5($contrasena);
	$perfil=$_POST["perfil"];
	$fechaIng = date('Y-m-d');

	$sql1="select * from afiliados where identificacionAfiliado='$cedula'";
	$res1=ejecutarSQL($sql1);
	if(($res1->num_rows)!=0)
	{
		echo "<script language='JavaScript'>
              alert('La Cedula ya se encuentra Registrada!');
              </script>";
	}
	else
	{
		$sql="insert into afiliados values ('$cedula','$tipoIdent','$lugarExp','$nombre','$apellido1','$apellido2','$fechaNac',
			'$telefono','$celular','$direccion','$ciudad','$email','$fechaIng',1)";
		$sql2="insert into usuarios values (null,'$perfil','$cedula','$usuario','$contrasena')";
		$res=ejecutarSQL($sql);
		$res=ejecutarSQL($sql2);
	//saveRegister($VP_usuario, "INSERTAR", "Propietario: Nuevo Registro ");
		if($res)
		{
			echo "<script language='JavaScript'>
                  alert('Informaci\u00f3n Guardada Exitosamente!');
                  </script>";
		} 
		else
		{
			echo "<script language='JavaScript'>
                  alert('Error al guardar la Informaci\u00f3n!');
                  </script>";
		}
	}
} 
else 
{
	?>
	<script type="text/javascript">
	//	location.href='index.php';
	</script>
	<?php 
}
?>	
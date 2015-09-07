<?php
session_start();
include ("config.php");
include ("funciones.php");

$usuario=$_POST["user"];
$clave=$_POST["pass"];
$clave=md5($clave);
$sql="select * from usuarios where nombreUsuario='$usuario' and contrasena='$clave'";
$resultado=@ejecutarSQL($sql);
if($file=mysqli_fetch_array($resultado)){
	if(($file['idPerfil']==1)or($file['idPerfil']==3))
	{
		$sql1="select e.nombreEmpleado, e.apellido1Empleado, e.apellido2Empleado 
		from empleados e, usuarios u where e.identificacionEmpleado=u.identificacion and u.nombreUsuario='$usuario';";
		$res1=ejecutarSQL($sql1);
		if($file1=mysqli_fetch_array($res1))
		{
			$_SESSION["s_Usuario"]=$usuario;
			$_SESSION["s_Clave"]=$clave;
			$_SESSION["s_Nombres"]=$file1['nombreEmpleado'];
			$_SESSION["s_Apellido1"]=$file1['apellido1Empleado'];
			$_SESSION["s_Apellido2"]=$file1['apellido2Empleado'];
	        echo "<div style=\"text-align:center\">Bienvenido al Sistema ".$_SESSION["s_Nombres"]." ".$_SESSION["s_Apellido1"]." ".$_SESSION["s_Apellido2"];
	        echo "<br />Espera un momento</div>";
	        ?>
            <script type="text/javascript">
	        setTimeout("location.href='form_principal.php'",3000);
			</script>
    		<?php
		}
		else 
        {
			echo "<div style=\"text-align:center\">Tu Usuario y Contraseña son incorrectas, vuelva a intentarlo";
			?>
			<script type="text/javascript">
			setTimeout("location.href='form_login.php'",3000);
			</script>
 			<?php
		}
	 }
	 else
	 {
	  if($file['Perfil']==2){
		   	$sql2="select a.nombreAfiliado, a.apellido1Afiliado, e.apellido2Afiliado 
		   	from afiliados a, usuarios u where a.identificacionAfiliado=u.identificacion and u.nombreUsuario='$usuario';";
		 	$res2=ejecutarSQL($sql2);
			$file2=(mysqli_fetch_array($res2));
			$_SESSION["s_Usuario"]=$usuario;
			$_SESSION["s_Clave"]=$clave;
			$_SESSION["s_Nombres"]=$file2['nombreAfiliado'];
			$_SESSION["s_Apellido1"]=$file2['apellido1Afiliado'];
			$_SESSION["s_Apellido2"]=$file2['apellido2Afiliado'];
	        echo "<div style=\"text-align:center\">Bienvenido al Sistema ".$_SESSION["s_Nombres"]." ".$_SESSION["s_Apellido1"]." ".$_SESSION["s_Apellido2"];
	        echo "<br />Espera un momento</div>";
	        ?>
            <script type="text/javascript">
	        setTimeout("location.href='form_principal.php'",3000);
			</script>
    		<?php
		}
	 }

}			
else 
{
echo "<div style=\"text-align:center\">Tu Usuario y Contraseña son incorrectas, vuelva a intentarlo";
?>
<script type="text/javascript">
setTimeout("location.href='form_login.php'",3000);
</script>
 <?php
}
?>

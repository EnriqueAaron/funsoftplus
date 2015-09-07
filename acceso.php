<?php 
session_start(); // Inicializar la sesión
include("config.php");
$acceso=false;
$VP_nombres;
$VP_apellidos;
$VP_usuario;    
$VP_perfil;
$VP_cedula;
if(isset($_SESSION["s_Usuario"])) 
  { // Comprueba que la sesion sea valida
    $sql="select * from usuarios where nombreUsuario='".$_SESSION["s_Usuario"]."' and contrasena='".$_SESSION["s_Clave"]."';";
    //echo $sql;
    $resultado=ejecutarSQL($sql);
	if ($file=mysqli_fetch_array($resultado))
	{
		if(($file['idPerfil']==1)or($file['idPerfil']==3))
	    {
			$sql1="select e.identificacionEmpleado, e.nombreEmpleado, e.apellido1Empleado, e.apellido2Empleado, u.nombreUsuario, p.perfil 
			from empleados e, usuarios u, perfil p where e.identificacionEmpleado=u.identificacion and u.nombreUsuario='".$_SESSION["s_Usuario"]."' 
			and u.idPerfil=p.idPerfil";
			$res1=ejecutarSQL($sql1);
            $result = $res1->fetch_assoc();
            $VP_nombres=$result['nombreEmpleado'];
    		$VP_apellido1=$result['apellido1Empleado'];
    		$VP_apellido2=$result['apellido2Empleado'];
    		$VP_usuario=$result['nombreUsuario'];
    		$VP_perfil=$result['perfil'];
			$VP_cedula=$result['identificacionEmpleado'];
    		$acceso=true;
		}
		else if($file['Perfil']==3)
		{
			$sql2="select a.identificacionAfiliado, a.nombreAfiliado, a.apellido1Afiliado, a.apellido2Afiliado, u.nombreUsuario, p.perfil 
			from afiliados a, usuarios u, perfil p where e.identificacionAfiliado=u.identificacion and u.nombreUsuario='".$_SESSION["s_Usuario"]."' 
			and u.idPerfil=p.idPerfil";
		 	$res2=ejecutarSQL($sql2);
			$result = $res2->fetch_assoc();
            $VP_nombres=$result['nombreAfiliado'];
    		$VP_apellido1=$result['apellido1Afiliado'];
    		$VP_apellido2=$result['apellido2Afiliado'];
    		$VP_usuario=$result['nombreUsuario'];
    		$VP_perfil=$result['perfil'];
			$VP_cedula=$result['identificacionAfiliado'];
    		$acceso=true;
		}
	}
 }
 else  
 {
 $acceso=false;	
 }
?>

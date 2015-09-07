<?php
function conectar() {
	$servidor=$GLOBALS['G_servidor'];
	$usuario=$GLOBALS['G_usuario'];
	$clave=$GLOBALS['G_clave'];
	$db=$GLOBALS['G_db'];
	$link = mysqli_connect($servidor,$usuario,$clave,$db);	
	
	return $link;
	}


function ejecutarSQL($squery)
{
	$link = conectar();
	$squery = iconv("UTF-8", "ISO-8859-1", $squery);
	 
	//return $resultado;

	if($resultado = $link->query($squery))
	{
		if(strpos($squery,"insert")===0)
			return $link;
			else
			return $resultado;
	} 
	else 
	{
		return false;
	}

}

	
	
function cargarSelect($query, $valueOpt, $valueShowOpt, $valueSelected, $itemSelected) 
{
	$result = ejecutarSQL($query); 
	$nreg = $result->num_rows;
	if($nreg!=0) 
	{
		while($fila=mysqli_fetch_array($result)) 
		{
			if(strpos($valueShowOpt,',')) 
			{ 
				$arrayValueShowOpt=split(',',$valueShowOpt);
				$numElementos=count($arrayValueShowOpt);
				$cont=0;
				while($cont<$numElementos) 
				{
					$fila[$valueShowOpt]=$fila[$valueShowOpt]." ".$fila[$arrayValueShowOpt[$cont]];
					$cont++;
				}
			}
			if($fila[$valueOpt]==$valueSelected) 
			{
				echo "<option value=\"".iconv("ISO-8859-1","UTF-8", $fila[$valueOpt])."\" selected=\"selected\">".iconv("ISO-8859-1","UTF-8", $fila[$valueShowOpt])."</option>";
			} 
			else 
			{
				if($fila[$valueShowOpt]==$itemSelected) 
				{
					echo "<option value=\"".iconv("ISO-8859-1","UTF-8", $fila[$valueOpt])."\" selected=\"selected\">".iconv("ISO-8859-1","UTF-8", $fila[$valueShowOpt])."</option>";
				}
				else 
				{
					echo "<option value=\"".iconv("ISO-8859-1","UTF-8", $fila[$valueOpt])."\">".iconv("ISO-8859-1","UTF-8", $fila[$valueShowOpt])."</option>";
				}

			}
		} // fin while	
	} 
}	


function echoc($txt)
{
	$txt=iconv("ISO-8859-1", "UTF-8", $txt); 
	echo $txt;
}


function devolverCampoId($idCampo,$valueIdCampo,$nameCampo,$tabla) 
{	
	$query="select $nameCampo from $tabla where $idCampo='$valueIdCampo'";
	$result=ejecutarSQL($query);
	//	echo "<br />$query<br />";
	$valorCampoRetornado=$result;
	if($nameCampo=="*" or strpos($nameCampo,',')) {
		if(mysql_num_rows($result)!=0)
			$valorCampoRetornado=$result;
			//echo "+ de un campo.";
		return $valorCampoRetornado;
	} else {
		if(mysql_num_rows($result))
			$valorCampoRetornado=mysql_result($result,0);
		return $valorCampoRetornado;
	}
}

// Recorre un directorio, y solo busca archivos en el primer nivel (no busca en subdirectorios)
// El parametro $type puede quedar vacío o con la palabra ALL para no filtrar por extensiones.  Si desea filtrar la busqueda a una extensión
// puede especificarla.  por ejemplo imagenes jpg.  Color en el parametro "jpg" 
function listardir2($ruta,$type){
	$arrayType=split(",",$type);	
	$nArrayType=count($arrayType);	
   if (is_dir($ruta)) {
      if ($dh = opendir($ruta)) {
		  $pos=0;
         while (($file = readdir($dh)) != false) {			 
			if($file!="." && $file!=".."){				
				if(is_file($ruta."/".$file)) {
					$ext=getExt($file);							
					if($type=="ALL" or $type=="")
						$arrayFile[$pos]=$file;									
					 else
						for($i=0;$i<$nArrayType;$i++)
							if($arrayType[$i]==$ext)
								$arrayFile[$pos]=$file;
					$pos++;						
				}
			}
		 } // while
		 closedir($dh);
	  }
	  return $arrayFile;
	}else {
     return false;
	}
}

function getExt($nombreArchivo) {
	$posicionPunto=strrpos($nombreArchivo,".");
	//echo "La posicion del punto es: ".$posicionPunto;
	$extension=substr($nombreArchivo,$posicionPunto+1);
	return $extension;
}


function saveRegister($user, $typeAc, $comments) {
		$sql="insert into auditoria values (NULL, '$user','$typeAc',NOW(),'$comments');";		
		$link=ejecutarSQL($sql);
		if(mysql_affected_rows($link)>0)
			return true;
		else
			return false;
		
}

function transaction2x($query,$query2) {
		$error=false;
		$db_servidorlocal=$GLOBALS['G_servidor'];
		$db_usuariolocal=$GLOBALS['G_usuario'];
		$db_clavelocal=$GLOBALS['G_clave'];
		$db_namelocal=$GLOBALS['G_db'];
				
		$link=conectar($db_servidorlocal,$db_usuariolocal,$db_clavelocal,$db_namelocal);
		$query=iconv("UTF-8", "ISO-8859-1", $query); // 28-07-2009 corrige problemas de tildes y eñes.
		mysql_query("BEGIN"); // Inicio transacción
		
		if(!mysql_query($query,$link))
			$error=true;
		if(!mysql_query($query2,$link))
			$error=true;
		
		if($error) {
			mysql_query("ROLLBACK");
			$rta=0;
		}
		else {
			mysql_query("COMMIT");
			$rta=1;
		}
		mysql_close($link);
		return $rta;
	}
?>
// JavaScript Document
// JavaScript Document


/************************************ Interprete de Javascript via Ajax *************************************/
        var tagScript = '(?:<script.*?>)((\n|\r|.)*?)(?:<\/script>)';
        /**
        * Eval script fragment
        * @return String
        */
        String.prototype.evalScript = function()
        {
                return (this.match(new RegExp(tagScript, 'img')) || []).evalScript();
        };
        /**
        * strip script fragment
        * @return String
        */
        String.prototype.stripScript = function()
        {
                return this.replace(new RegExp(tagScript, 'img'), '');
        };
        /**
        * extract script fragment
        * @return String
        */
        String.prototype.extractScript = function()
        {
                var matchAll = new RegExp(tagScript, 'img');
                return (this.match(matchAll) || []);
        };
        /**
        * Eval scripts
        * @return String
        */
        Array.prototype.evalScript = function(extracted)
        {
                var s=this.map(function(sr){
                         var sc=(sr.match(new RegExp(tagScript, 'im')) || ['', ''])[1];
                         if(window.execScript){							
                             // window.execScript(sc);							  
							  window.setTimeout(sc,0);
                         }
                        else
                       {						
                           window.setTimeout(sc,0);
                        }
                });
                return true;
        };
        /**
        * Map array elements
        * @param {Function} fun
        * @return Function
        */
        Array.prototype.map = function(fun)
        {
                if(typeof fun!=="function"){return false;}
                var i = 0, l = this.length;
                for(i=0;i<l;i++)
                {
                        fun(this[i]);
                }
                return true;
        };  
		
/*******************************************************************************************************************************************/

// Hacer peticiones con AJAX
// JS Carga Asincrona de Archivos mediante AJAX
var peticion = false;
try {
//Crea el objeto XMLhttpRequest para navegadores Firefox, Safari u Opera
peticion = new XMLHttpRequest();
} catch (trymicrosoft) {
try {
//Crea el objeto XMLhttpRequest para IE 6 ó superior
peticion = new ActiveXObject("Msxml2.XMLHTTP");
} catch (othermicrosoft) {
try {
//Crea el objeto XMLhttpRequest para IE 5
peticion = new ActiveXObject("Microsoft.XMLHTTP");
} catch (failed) {
peticion = false;
}
}
}

if (!peticion)
alert("ERROR AL INICIALIZAR!");
function loadContent(fragment_url, element_id) {
	//Se agrega random para saltar caché de AJAX
	//alert(fragment_url);
	var aleatorio= Math.random()*10;
	aleatorio=Math.round(aleatorio);
	var element = document.getElementById(element_id);
	element.innerHTML = '<div><img src="img/ajax-loader1.gif" align="absmiddle" border="0" /></div>';
	//alert(fragment_url +'?id='+aleatorio+'&'+qs);
	peticion.open("GET", fragment_url+aleatorio+'.html');
	peticion.onreadystatechange = function() {
		if (peticion.readyState == 4) {
		var scripts=peticion.responseText.extractScript();
		element.innerHTML = peticion.responseText.stripScript();
		scripts.evalScript();
		}
	}
	peticion.send(null);
}



// Para POST
function loadContentP(idCapa, urlString, datosVar)
{
    var titulo,texto,accion,ajax;
/*    titulo = document.getElementById('titulo').value;
    texto = document.getElementById('texto').value;
    accion = document.getElementById('accion').value;*/
// Cargador puede ir aquí
	element=document.getElementById(idCapa);
	var url = document.location.toString();
	//alert(url);
	var posicion = url.lastIndexOf('/'); // posicion = 3
	url=url.substr(0,posicion);
	//alert(url);
//posicion = mensaje.indexOf('b');     // posicion = -1
//	url=document.location;
	//posicion=url.indexOf('a');
	//alert(url);
	////////////// Para mostrar una imagen de cargar ////////////// Solo funciona en FF, (Por ahora) ////////////////
	element.innerHTML = "<div style='margin:auto; width:100px; text-align:center;'><img src='"+url+"/img/ajax-loader1.gif' align='absmiddle' border='0'  width='100' height='100' /></div>";
    ajax=peticion;
    ajax.open("POST",urlString,true);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");//Establece el valor de una etiqueta de las cabeceras de peticion 
	
    ajax.onreadystatechange=function() //Puntero a la función del manejador que se llama cuando cambia readystate
    {
		if (ajax.readyState==4) //Estado actual de la petición, si es igual a 4 esta completado
		{
		    if (ajax.status==200)//status codigo devuelto por el servidor. 
		     {				 
		     	 //element.innerHTML=ajax.responseText;
				 var scripts=peticion.responseText.extractScript();  // Se extrae el codigo javascript
		element.innerHTML = peticion.responseText.stripScript();  // se elimina el codigo javascript y se envia
		scripts.evalScript();  // se ejecuta el codigo javascript extraido
		     } else {
				// si el status es diferente a 200, indica que hay un error
			//	alert('Error AJAX Status !=200. Si visualiza este mensaje, por favor contacte con el Administrador.');
				}
		}
    }
    ajax.send(datosVar); //Ejecuta la petción, la variable 'datosVar' son datos que se envian al servidor
} 


function devuelveValor(ref) {
	var obj=document.getElementById(ref);
	return obj.value;
	}
	
function devuelveValorTextArea(ref) {
	var obj=document.getElementById(ref);
	//alert('.text: '+obj.text+' '+'.value: '+obj.value);
	return obj.text;
	}
	
function devuelveValorTd(ref){
	var obj=document.getElementById(ref);
	return obj.firstChild.nodeValue;
	}

function devuelveValorElement(ref){
	var obj=document.getElementById(ref);
	return obj.firstChild.nodeValue;
	}


function initValue(objs) {
	arrayObjs=objs.split(",");
	arrayObjs.length;
	msj=0;
	try {
	for(i=0;i<arrayObjs.length;i++) {	
		tipoObj=document.getElementById(arrayObjs[i]).type;
		switch(tipoObj) {
			case "checkbox":
				if(!document.getElementById(arrayObjs[i]).checked)
					$msj++;
			break;
			default:
			if(document.getElementById(arrayObjs[i]).value==null || document.getElementById(arrayObjs[i]).value=='--' || document.getElementById(arrayObjs[i]).value==false) {		
		
			if(document.getElementById(arrayObjs[i]).value.charCodeAt(0)==48) { // Si es Igual a 0 dejarlo pasar.			
			} else {
			msj++;
			}
			}
			break;
		}
		
		}
	} catch(ex) {
		msj++;
		}	
	if(msj!=0){	
		return false;// retorna false, para indicar que los Objetos recibidos No tienen valor.
		} else {
		return true;// retorna true, para indicar que los Objetos recibidos tienen valor.
		}
}


function setValue(refObj,value) {
	document.getElementById(refObj).value=value;
	}
	
function valNumeroCed(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Cedula Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroTel(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Telefono Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}


function valNumeroCel(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Celular Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroRegistro(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Registro Inmobiliario Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroPredial(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Numero Predial Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumero(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroSu(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Sueldo Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroMes(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Mes Pago Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumApto(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Apartamento No. Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroAnio(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo A\u00f1o Pago Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroDiasT(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Dias Trabajados Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroSalud(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Aporte Salud Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroPension(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Pension Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}function valNumeroSeguroExe(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Seguro Exequial Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroMovil(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Plan Movil Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroDeducc(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Otras Deducciones Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroAnticipos(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Anticipos Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroArea(input){
	if (!/^([0-9.])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Area Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroPago(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Valor Pago Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroC(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Cantidad Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroValor(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Valor Venta Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroValorT(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Valor Total Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroAux(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Auxilio Transporte Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valNumeroVal(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Valor x m2 Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valNumeroPre(input){
	if (!/^([0-9])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Presupuesto Solo Permite Valor Numerico");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valLetra(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valLetraNombres(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Nombres Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valLetraNombre(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Nombre Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valLetraUsuario(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Usuario Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}
function valLetraResp(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Responsable Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}


function valLetraApellidos(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Apellidos Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valLetraCargo(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Cargo Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valLetraLE(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Lugar de Expedici\u00f3n Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function valLetraUsuario(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Usuario Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
		
	}
}

function valLetraManzana(input){
	if (!/^([A-Za-z\s*])*$/.test(input.value)) {
		//numero=input.value;
		alert("El Campo Manzana Solo Permite Letra");
		inputItem=document.getElementById(input.id);
		inputItem.value="";
	}
}

function validarEmail(ref) {
	   var obj=document.getElementById(ref);
       if (/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/.test(obj.value)){
          return true;
	   }
		  else {
		  return false;
		  }

}

function valNomLote(ref) {
	   var obj=document.getElementById(ref);
       if (/^([A-Z]{1})([0-9]{2})$/.test(obj.value)){
          return true;
	   }
		  else {
		  return false;
		  }

}

function valNumPredial(ref) {
	   var obj=document.getElementById(ref);
       if (/^\d{2}\s\d{2}\s\d{4}\s\d{4}\s\d{3}$/.test(obj.value)){
          return true;
	   }
		  else {
		  return false;
		  }

}

function valRegistro(ref) {
	   var obj=document.getElementById(ref);
       if (/^\d{3}-\d{6}$/.test(obj.value)){
          return true;
	   }
		  else {
		  return false;
		  }

}

function valFecha(ref) {
	   var obj=document.getElementById(ref);
       if (/^((?:19|20)\d\d)\/((?:0?[1-9])|(?:1[0-2]))\/((?:0?[1-9])|(?:[12]\d)|(?:3[01]))$/.test(obj.value)){
          return true;
	   }
		  else {
		  return false;
		  }

}

function valMinimoCaracteresCed(ref){
		if(document.getElementById(ref).value.length <= 6){
			//alert('ingrese un nombre de minimo 7 caracteres');
			return false;
		}else{
				return true;
		}
	}

function valMinimoCaracteres(ref){
		if(document.getElementById(ref).value.length <= 5){
			//alert('ingrese un nombre de minimo 6 caracteres');
			return false;
		}else{
				return true;
		}
	}


function devuelveValorButton(ref)
{
	var obj=document.getElementsByName(ref);
	var i
    for(i=0;i<obj.length;i++)
       if(obj[i].checked)
	 return obj[i].value;
}

function valButton(ref){
var obj=document.getElementsByName(ref);
 
var seleccionado = false;
for(var i=0; i<obj.length; i++) {	
  if(obj[i].checked) {
   // seleccionado = true;
    break;
	return true;
  }
}
return false;
	
}
// MasterLyte
bandera_ActivarML=0;
function ActivarML(idObj, idObj_Destino) {
	if(bandera_ActivarML==0) {
		bandera_ActivarML=1;
		refObj_Div=document.createElement('div');
		refObj_Div.id='light';
		/*refObj_Div.setAttribute('class','white_borde');*/
		refObj_Div.className="white_borde";//background:#09F; position:absolute; top: 25%; left: 25%; width: 50%; height: 50%; z-index:1003;');
		refObj_Destino=document.getElementById(idObj_Destino);
		refObj_Destino.appendChild(refObj_Div);
		//  	position:absolute;
		refObj_Div2=document.createElement('div');
		refObj_Div2.id='lightContent';
		/*refObj_Div.setAttribute('class','white_borde');*/
		refObj_Div2.className='white_content'; //position:absolute; top:10%; left:2%; right:2%; bottom:10%; background-color:white; z-index:1002; overflow:auto;');
		refObj_Destino2=document.getElementById(refObj_Div.id);
		//refObj_Destino2.appendChild(refObj_Div2); // Incluye la capa de contenido dentro de la de borde
		refObj_Destino.appendChild(refObj_Div2); // Incluye la capa dentro del Div Principal
		// black_overlay{
		refObj_Div3=document.createElement('div');
		refObj_Div3.id='fade';
		refObj_Div3.onclick=function() { //document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'; document.getElementById('lightContent').style.display='none'; 
		}
		refObj_Div3.className='black_overlay'; //'position: absolute; top: 0%; left: 0%; width: 100%; height: 960px; background-color:#000; z-index:1001; -moz-opacity: 0.3; opacity:0.30; filter:alpha(opacity=30);');
		refTextAutor=document.createTextNode('');
		refObj_Div3.appendChild(refTextAutor);
	//	alert(i++);
	//	refObj_Destino=document.getElementById(idObj_Destino);
		refObj_Destino.appendChild(refObj_Div3);
	} else if(bandera_ActivarML==1){
document.getElementById('light').style.display=''; document.getElementById('fade').style.display='';
document.getElementById('lightContent').style.display='';
		}
}



//
function calcularNomina(sueldo,dias) {
	sueldoBasico=parseFloat(devuelveValor(sueldo)); 
	diasT=devuelveValor(dias);
	setValue('Aporte_Salud',sueldoBasico*4/100);
	setValue('Pension',sueldoBasico*4/100);
}

function calcularNominaHE(sueldo,dias,hrsextras) {
	sueldoBasico=parseFloat(devuelveValor(sueldo)); 
	horasExtras=parseFloat(devuelveValor(hrsextras)); 
	diasT=devuelveValor(dias);
	devengado=sueldoBasico+horasExtras;
	setValue('Aporte_Salud',devengado*4/100);
	setValue('Pension',devengado*4/100);
}

function replaceTextArea(idTextArea,varReplace,valueVar) {
	refTextArea=document.getElementById(idTextArea);
	valorTextArea=refTextArea.value;
	valorTextArea=valorTextArea.replace("{#"+varReplace+"}",valueVar);
	refTextArea.value=valorTextArea;
	}


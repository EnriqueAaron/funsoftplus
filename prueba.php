
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Prueba de AutoComplete con jQuery, PHP y MySQL</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<link href="ui-lightness/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css" />
<script>
  $(function(){
    var autocompletar = new Array();
           autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("");
            autocompletar.push("#ACTA en México ¿Cómo quedamos?");
            autocompletar.push("#ACTA es visto como un arma de intimidación");
            autocompletar.push("#ACTA recibe otro golpe en Europa a pocos días de su votación final");
            autocompletar.push("#ACTA se equivoca tanto en contenido como en proceso");
            autocompletar.push("#Android - Establecer una imagen de background a un frame desde URL");
            autocompletar.push("#Humor - Hay una actualización para tu computadora");
            autocompletar.push("#Humor - Prueba del sistema de emergencia nacional");
            autocompletar.push("#Infografía - El poder de Wordpress");
            autocompletar.push("#México - Adiós #RENAUT ¿Qué sigue ahora?");
            autocompletar.push("#NoTodoEsDF");
            autocompletar.push("#Snippet, como descargar y abrir un PDF desde una aplicación #Android");
            autocompletar.push("#Snippet, saber si un checkbox se encuentra marcado con #jQuery");
            autocompletar.push("#SOPA ¿Qué pasa después del apagón? #Doring, #TPP y otras yerbas");
            autocompletar.push("#Tutorial - Configuración del SDK de Android en NetBeans");
            autocompletar.push("#Tutorial de efecto tipo Polaroid con #CSS3");
            autocompletar.push("#Videojuegos - Shades of Violet, aventura gráfica de estética steampunk");
            autocompletar.push("#Videojuegos - Video de assets de Shades of Violet");
            autocompletar.push("#YesWeCan - ¡Muchas Gracias!");
            autocompletar.push("0.34% de las compras del Black Friday pertenecen a las redes sociales");
            autocompletar.push("10 Espectaculares efectos de texto con Photoshop");
            autocompletar.push("10 patrones de fondo de página para tus diseños");
            autocompletar.push("10 Plugins de Wordpress muy recomendables");
            autocompletar.push("15 galerías de fotos en jQuery");
            autocompletar.push("2011 en unas líneas");
            autocompletar.push("25 años de Microsoft Excel");
            autocompletar.push("3 plugins de jQuery para Google Maps");
            autocompletar.push("5 Plugins de Wordpress para comentarios");
            autocompletar.push("5 temas de #Wordpress con Responsive Design para tu blog");
            autocompletar.push("5 temas de Wordpress gratuitos para empezar el año");
            autocompletar.push("5 Temas de Wordpress para este fin de semana");
            autocompletar.push("7 trucos útiles para MySQL");
            autocompletar.push("9 tutoriales de Photoshop en español");
            autocompletar.push("99.5% de los Social Media Experts son unos payasos");
            autocompletar.push("Activar la característica multisitio de Wordpress 3.0");
            autocompletar.push("Administración de Sistemas");
            autocompletar.push("Adobe abandona por completo el Flash Player para #Android");
            autocompletar.push("Adobe Flex en una semana");
          $("#buscar").autocomplete({ //Usamos el ID de la caja de texto donde lo queremos
       source: autocompletar //Le decimos que nuestra fuente es el arreglo
     });
  });
</script>
<style>
a{
	text-decoration: none;
	color: #930;
}
a:hover{
	background-color: #930;
	color: #FFF;
}
</style>
</head>
<body>
</body>
<div style="margin: 40px auto; width: 400px; text-align: center; height: 400px; background-color: #F7F7F7; font-family: Verdana, Geneva, sans-serif;">
<img src="../images/tarjuccino.png" alt="Tarjuccino - Prueba de Autocomplete con jQuery, PHP y MySQL" title="Tarjuccino - Prueba de Autocomplete con jQuery, PHP y MySQL" />
<h2>Prueba de Autocomplete</h2>
<p>En cuanto aparezcan las opciones puedes seleccionar alguna</p>
<p><input type="text" id="buscar" /></p>
<p><a href="http://tarjuccino.com/tutoriales/programacion-web/autocompletar-con-jquery-php-y-mysql/">Regresar al tutorial</a> o si lo prefieres <a href="http://tarjuccino.com">Regresar a Tarjuccino</a></p>
</div>
</html>
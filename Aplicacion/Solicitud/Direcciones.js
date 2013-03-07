function msm(){
	alert('xxxx');
}

var casilla;

// Copiado del visor, esta en validaciones.js
/* Se usa para lanzar el evento afterupdate, como estamos en otra ventana, no se
tiene acceso a los los manejadores del visor, por lo tanto se copio y se
modifico de tal forma que no consulta en la tabla EVENTOS sino que llama
directamente el evento afterupdate.
*/
function evaluate(objCas){
   //crea el evento para refrescar el valor y lo dispara.
   if (objCas.dispatchEvent){
      //Codigo para mozilla.
      var evento = document.createEvent("Events");
      evento.initEvent('afterupdate', true, true);
      objCas.dispatchEvent(evento);
   } else if(objCas.fireEvent) {
      //Codigo para IE
       objCas.fireEvent("onafterupdate");
   }
}

/* Esta funciÃ³n se usa como definiciÃ³n de evento para lanzar eventos programaticamente
 * en casillas readonly, cuyos valores son actualizados por cÃ³digo y por lo tanto no
 * lanzan eventos como onchange, es usado por el mÃ©todo extendido evaluate de HTMLInputElement.
 * Se copio de validaciones.js
 */
function afterupdate(){
   return;
}

function retornaDireccion(campoSalida,direccion)  {
   // Retorna la dirección en el campo campoSalida del pagina que abrio el generador de Direcciones y cierra   la ventana.
   // campoSalida:  Parametro de entrada que contiene el nombre de campo de la pagina destino.
   // direccion: parametro de entrada que contiene la dirección a retornar.
    var url = document.location.toString();
  	var y = url.lenght;
	var x = url.indexOf("=");
	var z = campoSalida;

	var campoStr = direccion;
	var salida = "";
	var j=0;
	for (i=0;i<campoStr.length;i++) {
	    var ca = campoStr.charAt(i);
	    if (j==0 && ca != ' ' ) j=1;
		if (j==1) salida = salida + ca;
	}
	direccion = salida;
	var campoStr = direccion;
	var salida = "";
	var j = 0;
    for (i=campoStr.length-1;i>-1;i--) {
	    var ca = campoStr.charAt(i);
		if (ca!=' ') j=1;
        if (j==1) salida = ca + salida;
	}
	direccion = salida;
	//alert(salida);
	eval('opener.document.forms[0].' + casilla + '.value=\"' + direccion + '\"');
	eval('evaluate(opener.document.forms[0].' + casilla + ')');
	//alert(z);
	//opener.parent.document.getElementById(z).value = direccion ;
	window.close();
}

function cargaValorCampo(campoSalida)  {
   // Carga el valor del campo de la ventana opener dado como parametro en  de entrada en el campo de la ventana actual
   // dado en la vatiable de entada campoSalida.
     var url = document.location.toString();

        var y = url.length;
	var x = url.indexOf("=");
	var z = url.substr(x+1,y);
	var zz="";
	for (i = 0; i < z.length ; i++) {
         if (z.substr(i,1) != '#')
		    zz += z.substr(i,1);
	}
	z = zz;
	var salida = "";
        casilla = z;
	salida = eval('opener.document.forms[0].' + z + '.value');

        //alert(campoSalida);
        document.getElementById(campoSalida).value = salida;
	//document.getElementById(campoSalida).value = salida;
}

function retornaDato1(campoSalida,dato)  {
   // Retorna el valor del dato en el campo campoSalida del pagina que abrio y cierra   la ventana.
   // campoSalida:  Parametro de entrada que contiene el nombre de campo de la pagina destino.
   // dato: parametro de entrada que contiene dato a retornar.
    var url = document.location.toString();
	var y = url.length;
	var x = url.indexOf("=");
	var z = url.substr(x+1,y);
	var zz="";
	for (i = 0; i < z.length ; i++) {
         if (z.substr(i,1) != '#')
		    zz += z.substr(i,1);
	}
	z = zz;
	eval('opener.parent.document.forms[0].' + z + '.value=\"' + dato + ' \"');
	window.close();
}

function leeParametro() {
   // Lee parametro de estrada.
   // valor:  Parametro de entrada.
   // dato: parametro de entrada que contiene dato a retornar.

    var url = document.location.href.toString();
	var y = url.length;
	var x = url.indexOf("=");
	var z = url.substr(x+1,y);
	var zz="";
	for (i = 0; i < z.length ; i++) {
         if (z.substr(i,1) != '#')
		    zz += z.substr(i,1);
	}
	z = zz;
	return z;
}

function concatenaString(valorString1, valorString2,campoSalida) {
   // cancatena dos string y los deja en la variable campoSalida.
   // valorString1:  parametro de entrada con l string a concatenar.
   // valorString1:  parametro de entrada con 2 string a concatenar.
   // campoSalida: parametro de entrada con el nombre de campo que contendrá el string concatenado.
   var campoStr = valorString1;
   salida= "";
   var j=0;
   for (i=campoStr.length-1;i>-1;i--) {
	       var ca = campoStr.charAt(i);
		   if (ca!=' ') j=1;
           if (j==1) salida = salida + ca;
	}
	campoStr = salida;
	salida = "";
	j = 0;
	for (i=0;i<campoStr.length;i++) {
	    var ca = campoStr.charAt(i);
	    if (ca==' ') j=1;
        if (j!=1) salida = salida + ca;
	}
	campoStr = salida;
	salida = "";
	for (i=campoStr.length-1;i>-1;i--) {
	    var ca = campoStr.charAt(i);
	    salida = salida + ca;
	}
   var anterior = salida;
   if (anterior.length > 0){
      if(validaDireccion(valorString2,anterior)) {
           salida = valorString1 + " " + valorString2.toUpperCase();
           document.getElementById(campoSalida).value = salida;
	  } else {
        alert("no puede seleccionar dos nomenclaturas iguales ni más de dos letras seguidas");
      }
   }
   else {
      salida = valorString1 + " " + valorString2.toUpperCase();
	  document.getElementById(campoSalida).value= salida;
      //eval('document.getElementById(' + campoSalida + ').value=\"' + salida + '\"');
   }
}

function concatenaNumero(valorString1, valorString2,campoSalida) {
   // cancatena dos string y los deja en la variable campoSalida.
   // valorString1:  parametro de entrada con l string a concatenar.
   // valorString1:  parametro de entrada con 2 string a concatenar.
   // campoSalida: parametro de entrada con el nombre de campo que contendrá el string concatenado.
   var salida = "";
   //if(valorString2=="") {
   //    alert("Se debe seleccionar un componente de direccion " );
   // }
   //else {
       //alert("entrada" + valorString1.length);
	   var n = valorString1.length-1;
	   var aux = valorString1.substr(n,1);
	   if (aux == "0" || aux == "1" || aux == "2" ||aux == "3" ||aux == "4" ||aux == "5" ||aux == "6" ||
	   aux == "7" || aux == "8" || aux == "9") {
	       salida = valorString1.substring(0,n+1);
	       salida += valorString2;
		} else {
		  salida = valorString1 + " " + valorString2;
        }
        document.getElementById(campoSalida).value= salida;
//   }
}

function validaDireccion(valor1,valor2) {
 var letras =  new Array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
 var valida = true;
 var letra1 = false;
 var letra2 = false;
 var control = parseInt(document.getElementById('controlaLetras').value);
 if (valor1 != null && valor2 != null) {
 /*   if (valor1 == valor2) {
	   valida = false;
	} */
    for (i=0;i<letras.length;i++) {
	       if (valor1 == letras[i]) letra1 = true;
           if (valor2 == letras[i]) letra2 = true;
	}
	if (letra1 && letra2) {
	   control++;
	   document.getElementById('controlaLetras').value = control;
	   if (control > 2)
	      valida = false;
	}
	else {
	    if (valor1 == valor2) {
	       valida = false;
	    }
	    document.getElementById('controlaLetras').value = "0";
	}
	return valida;
  }
}

function borraUltComponenteDireccion(valorString1,campoSalida) {
   // Borrar el ultimo compomente de la direccioón.
   // valorString1:  parametro de entrada con el string de la dirección.
   // campoSalida: parametro de entrada con el nombre de campo que contendrá el nuevo string (direccion modificada.
   var salida = "";
   var campoStr = valorString1;
   var j = 0;
   var n = campoStr.length;
   if(campoStr.length > 0) {
   	   for (i=campoStr.length-1;i>-1;i--) {
	       var ca = campoStr.charAt(i);
		   if (ca!=' ' && ca!='#' && ca!='-') j=1;
               if (j==1) salida = salida + ca;
	   }
	   var k = salida.length;
	   campoStr = salida;
	   n = n - k;
	   if (n > 2) {
	      for (z=n;z>2;z--){
		       campoStr = " " + salida;
	      }
	   }
       salida = "";
	   k = campoStr.length;
	   j=0;
	   for (i=0;i<k;i++) {
	       var ca = campoStr.charAt(i);
		   if (ca==' ' ) j=1;
		   if (j==1) salida = salida + ca;
	   }
	   campoStr = salida;
	   k = campoStr.length;
	   salida = "";
	   for (i=k-1;i>-1;i--) {
	       var ca = campoStr.charAt(i);
		   salida = salida + ca;
	   }
   }
   document.getElementById(campoSalida).value = salida;
}

function borraEspaciosDerecha(valorString1,campoSalida) {
 var salida = "";
 var campoStr = valorString1;
 var j = 0;
 if(campoStr.length > 0) {
    for (i=campoStr.length-1;i>-1;i--) {
	    var ca = campoStr.charAt(i);
		if (ca!=' ') j=1;
        if (j==1) salida = ca + salida;
	 }
     document.getElementById(campoSalida).value = salida;
  }
}

function borraEspaciosInternos(valorString1,campoSalida) {
 var salida = "";
 var campoStr = valorString1;
 var j = 0;
 if(campoStr.length > 0) {
    for (i=0;i<campoStr.length;i++) {
	    var ca = campoStr.charAt(i);
		if (ca!=' ') j=0;
		else j++;
        if (j<2) salida = salida + ca;
	 }
     document.getElementById(campoSalida).value = salida;
  }
}

function generadorDirecciones(campoRetorno) {
     	var url = "";
		url = "./direcciones.jsp?retorno=" + campoRetorno;
		//url = "/generadorweb/CargarGneradorDireccionesRUT?retorno=" + campoRetorno;
     	abrirPantalla(url,"Generador de direcciones",640,380,50,50);
}

function generadorDireccionesB(campoRetorno) {
     	var url = "";
		url = "./direccionesA.jsp?retorno=" + campoRetorno;
		//url = "/generadorweb/cargargeneradordireccionesrut?retorno=" + campoRetorno;
     	abrirPantalla(url,"Generador de direcciones",540,400,50,50);
}

function generadorDireccionesA(campoRetorno) {
     	var url = "";
		url = "/WebRut/formularios/direccionesD.jsp?retorno=" + campoRetorno;
		//url = "/generadorweb/cargargeneradordireccionesrut?retorno=" + campoRetorno;
     	abrirPantalla(url,"Generador de direcciones",720,560,50,50);
}

function confirmacionEnvio(errores) {
     	var url = "";
		url = "/WebRut/formularios/confirmaEnvio.jsp?errores=" + errores;
		abrirPantalla(url,"Confirmación de envio",370,320,50,50);
}

function confirmacionEnvio1(campoRetorno) {
     	var url = "";
		url = "/WebRut/formularios/confirmaEnvio.jsp?retorno=" + campoRetorno;
		//url = "/generadorweb/cargargeneradordireccionesrut?retorno=" + campoRetorno;
     	abrirPantalla(url,"Confirmación de envio",400,380,50,50);
}

function cargarTablaContribuyente(campoRetorno) {
     	var url = "";
		url = "/WebRut/ayuda/tablasq/tipoContribuyente.htm?retorno=" + campoRetorno;
        window.open(url,'',"toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=420, height=380, top=50, left=50");
	  }

function cargarTablarResponsabilidades(campoRetorno) {
     	var url = "";
		url = "/WebRut/ayuda/tablasq/tipoResponsabilidad.htm?retorno=" + campoRetorno;
		window.open(url,'',"toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=420, height=380, top=50, left=50");
}

function cargarTablaDocumento(campoRetorno) {
     	var url = "";
		url = "/WebRut/ayuda/tablasq/tipoDocumento.htm?retorno=" + campoRetorno;
		window.open(url,'',"toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=420, height=380, top=50, left=50");
}

function abrirPantalla(url, titulo ,ancho,alto,posx,posy) {
  window.open(url,'titulo',"toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=" + ancho + ", height=" + alto + ", top=" + posy + ",left=" + posx)
}

function borraElemento(campoSalida) {
// Borra el elelmento seleccionado de la lista de un campo tipo select.
   // campoSalida: parametro de entrada con el nombre de campo tipo select donde se llenará la lista modificada.   jsArrayElementos = new Array();
   jsArrayElementos = new Array();
   lengthSelect = document.getElementById(campoSalida).length;
   var indice = 0;
   for (i=0;i<lengthSelect;i++) {
      if (document.getElementById(campoSalida).selectedIndex!= i) {
         jsArrayElementos [indice] = document.getElementById( campoSalida).options[i].text;
	  indice++;
	  }
   }
   var i = lengthSelect - 1;
   while (i>=0) {
      document.getElementById(campoSalida).remove(i);
      i--;
   }
   ls = jsArrayElementos.length;
   for (var i=0;i < ls; i++) {
	       oOption 	= document.createElement("OPTION");
           oOption.text = jsArrayElementos [i];
	       oOption.value = i + " ";
           document.getElementById(campoSalida).add(oOption);
   }
}

function LimpiaElementosLista(campoSalida) {
// Limpia los elementos de una de la lista de un campo tipo select.
// campoSalida: parametro de entrada con el nombre de campo tipo select.
  // lengthSelect = document.getElementById(campoSalida).length;
   //var i = lengthSelect - 1;
  //while (i>=0) {
   //   document.getElementById(campoSalida).remove(i);
   //   i--;
   //}
   document.getElementById('direccion').value="";
  // document.forms[0].puente.value="";
  document.getElementById('puente').value="";
}

function AddElemento(valor,campoSalida) {
   // Adiciona un elelmento a una lista de un campo tipo select.
   // campoSalida: parametro de entrada con el nombre de campo tipo select donde se llenará la lista modificada.

   jsArrayElementos = new Array();
   lengthSelect = document.getElementById(campoSalida).length; // ***************  eval('document.forms[0].' + campoSalida + '.length' );
   for (i=0;i<lengthSelect;i++) {
      jsArrayElementos [i] = document.getElementById(campoSalida ).options[i].text.toUpperCase();  // ***************eval('document.forms[0].' + campoSalida + '.options[' + "i" +'].text.toUpperCase()' );
   }
   var i = lengthSelect - 1;
   while (i>=0) {
       document.getElementById(campoSalida).remove(i); // ***********eval('document.forms[0].' + campoSalida + '.remove(' + "i" +')' );
      i--;
   }
   ls = jsArrayElementos.length;
   for (var i=0;i < ls; i++) {
	       oOption 	= document.createElement("OPTION");
           oOption.text = jsArrayElementos [i];
	       oOption.value = i + " ";
           document.getElementById(campoSalida).add(oOption); // *********eval('document.forms[0].' + campoSalida + '.add(oOption)' );
   }
   var oOption 	= document.createElement("OPTION");
   oOption.text = valor;
   oOption.value = i;
   document.getElementById(campoSalida).add(oOption);
   //alert("addElemento");
   //eval('document.forms[0].' + campoSalida + '.add(oOption)' );
}

function subeElemento(campoSalida) {
   // Sube el elelmento seleccionado de la lista de un campo tipo select.
   // campoSalida: parametro de entrada con el nombre de campo tipo select donde se llenará la lista modificada.
   jsArrayElementos = new Array();
   lengthSelect =  document.getElementById(campoSalida).length;//************** eval('document.forms[0].' + campoSalida + '.length' );
   var indice = 0;
   for (i=0;i<lengthSelect;i++) {
      if (document.getElementById(campoSalida).selectedIndex != i) {
      jsArrayElementos [indice] = document.getElementById(campoSalida).options[i].text;
	  indice++;
	 }
	 else {
	   if (i>0){
	     actual =  document.getElementById(campoSalida).options[i].text;
		 jsArrayElementos [indice] = document.getElementById(campoSalida).options[i-1].text;
		 jsArrayElementos [indice - 1] = document.getElementById(campoSalida).options[i].text;
		 indice++;
	 }
	 else {
	      jsArrayElementos [indice] = document.getElementById(campoSalida).options[i].text;
	  indice++;
	 }

   }
}
var i = lengthSelect - 1;
   while (i>=0) {
      document.getElementById(campoSalida).remove(i);
      i--;
   }
   ls = jsArrayElementos.length;
   for (var i=0;i < ls; i++) {
	       oOption 	= document.createElement("OPTION");
           oOption.text = jsArrayElementos [i];
	       oOption.value = i + " ";
           document.getElementById(campoSalida).add(oOption);
   }
 }

function bajaElemento(campoSalida) {
   // Baja el elelmento seleccionado de en la lista de un campo tipo select.
   // campoSalida: parametro de entrada con el nombre de campo tipo select donde se llenará la lista modificada.
   jsArrayElementos = new Array();
   lengthSelect = document.getElementById(campoSalida).length;
   var indice = 0;
   var baja = 0;
   var actual = " ";
   for (i=0;i<lengthSelect;i++) {
   if (document.getElementById(campoSalida).selectedIndex != i) {
	    jsArrayElementos [indice] = document.getElementById(campoSalida).options[i].text;
	    indice++;
		if (baja == 1) {
	        jsArrayElementos [indice] = actual;
	        indice++;
		    baja = 0;
		   }
	 }
	 else {
	   if (i < lengthSelect - 1){
	     actual =  document.getElementById( campoSalida).options[i].text;
		 baja = 1;
	  }
	  else {
	     jsArrayElementos [indice] = document.getElementById( campoSalida).options[i].text;
	    indice++;
	  }

   }
}
var i = lengthSelect - 1;
   while (i>=0) {
      document.getElementById(campoSalida).remove(i);
      i--;
   }
   ls = jsArrayElementos.length;
   for (var i=0;i < ls; i++) {
	       oOption 	= document.createElement("OPTION");
           oOption.text = jsArrayElementos [i];
	       oOption.value = i + " ";
           document.getElementById(campoSalida).add(oOption);
   }

}

function pasaElementosAString(campoLista,campoSalida) {
   // Pasa los elementos de un campo tipo lista a un campo tipo string.
   // campoLista: parametro de entrade con el nombre del campo tipo lista.
   // campoSalida: parametro de entrada con el nombre del campo tipo string donde se concatenan los elementos de la lista.
   var salida = "";
   lengthSelect = document.getElementById(campoLista).length;
   for (i=0;i<lengthSelect;i++) {
        salida = salida + document.getElementById(campoLista).options[i].text;
  }

  document.getElementById(campoSalida).value = salida;
 }

function ocultaComplemento() {
     // Muestra o esconde campo complemento a una nomenclatura que lo requiera
	 // <DIV STYLE="display:yes" ID="COMPLEMENTO">  </DIV>
	 // valorAValidar: Parametro de entrada que contiene el valor a validar para esconder la sección.
	 // valor:  Parametro de entrada que contiene el valor, si es igual al contenido de valorAValidar
	 //         escode la sección sino la muestra.
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
     with  (document.getElementById('COMPLEMENTOS').style)
		         display="none";
     document.getElementById('complementoActivo').value = '0';
}

function ocultaComplementoCalle() {
     // Muestra o esconde campo complemento a una nomenclatura que lo requiera
	 // <DIV STYLE="display:yes" ID="COMPLEMENTO">  </DIV>
	 // valorAValidar: Parametro de entrada que contiene el valor a validar para esconder la sección.
	 // valor:  Parametro de entrada que contiene el valor, si es igual al contenido de valorAValidar
	 //         escode la sección sino la muestra.
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
	with  (document.getElementById('COMPLEMENTOCALLE').style)
		         display="none";
}

function muestraComplemento(nomenclatura) {
     // Muestra o esconde una seccion en documento que este dentro de las etiquetas
	 // <DIV STYLE="display:yes" ID="seccion">  </DIV>
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
       with  (document.getElementById('COMPLEMENTOS').style)
		         display="";
	   document.getElementById('nombreComplemento').value = "Digite nombre " + nomenclatura + ":";
	   document.getElementById('complementoActivo').value = '1';
	   document.getElementById('complemento').value = '';
	   document.getElementById('complemento').focus();
}

function muestraComplementoCalle(nomenclatura) {
     // Muestra o esconde una seccion en documento que este dentro de las etiquetas
	 // <DIV STYLE="display:yes" ID="seccion">  </DIV>
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
       with  (document.getElementById('COMPLEMENTOCALLE').style)
		         display="";
       document.getElementById('complementoActivo').value = '2';
	   document.getElementById('auxiliar').value = nomenclatura;
	   document.getElementById('nombreComplementoCalle').value = nomenclatura + " con nombre?";
	   document.getElementById('complementoCalleSN').focus();
}

function enComplemento(){
   if(document.getElementById('complementoActivo').value == "1")
      document.getElementById('complemento').focus();
   if(document.getElementById('complementoActivo').value == "2")
      document.getElementById('complementoCalleSN').focus();
}

function ocultaConfirma() {
     // Muestra o esconde campo complemento a una nomenclatura que lo requiera
	 // <DIV STYLE="display:yes" ID="COMPLEMENTO">  </DIV>
	 // valorAValidar: Parametro de entrada que contiene el valor a validar para esconder la sección.
	 // valor:  Parametro de entrada que contiene el valor, si es igual al contenido de valorAValidar
	 //         escode la sección sino la muestra.
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
     with  (eval('CONFRIMAR' + '.style'))
		         display="none";
     document.getElementById('complementoActivo').value = '0';
}

function muestraConfirma(errores) {
     // Muestra o esconde una seccion en documento que este dentro de las etiquetos
	 // <DIV STYLE="display:yes" ID="seccion">  </DIV>
	 // valorAValidar: Parametro de entrada que contiene el valor a validar para esconder la sección.
	 // valor:  Parametro de entrada que contiene el valor, si es igual al contenido de valorAValidar
	 //         escode la sección sino la muestra.
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
	  if (errores == 1)  {
	  	document.getElementById("ERRORES").style.display="";
 	  }
	  else {
	  	document.getElementById("CONFIRMAR").style.display="";
	  }
}

function verificaComplemento(nomenclatura) {
     // Muestra o esconde una seccion en documento que este dentro de las etiquetos
	 // <DIV STYLE="display:yes" ID="seccion">  </DIV>
	 // valorAValidar: Parametro de entrada que contiene el valor a validar para esconder la sección.
	 // valor:  Parametro de entrada que contiene el valor, si es igual al contenido de valorAValidar
	 //         escode la sección sino la muestra.
	 // seccion: Parametro de entrada que contiene el nombre de la sección a mostrar o a esconder.
	 // var salida = " Digite nombre ";
	 var salida = "";
	 if (nomenclatura == "EDIFICIO" || nomenclatura == "ADMINISTRACION"
            || nomenclatura == "AEROPUERTO"
			|| nomenclatura == "AGENCIA"
            || nomenclatura == "AGRUPACION"
            || nomenclatura == "AVENIDA CARRERA"
            || nomenclatura == "ALMACEN"
            || nomenclatura == "AUTOPISTA"
            || nomenclatura == "AVENIDA"
            || nomenclatura == "BOULEVAR"
            || nomenclatura == "BARRIO"
			|| nomenclatura == "BODEGA"
			|| nomenclatura == "CARRERA"
			|| nomenclatura == "CARRETERA"
			|| nomenclatura == "CASA"
            || nomenclatura == "CENTRO COMERCIAL"
            || nomenclatura == "CIUDADELA"
            || nomenclatura == "CELULA"
            || nomenclatura == "CAMINO"
            || nomenclatura == "CONJUNTO RESIDENCIAL"
            || nomenclatura == "CONJUNTO"
            || nomenclatura == "CORREGIMIENTO"
           	|| nomenclatura == "CASERIO"
            || nomenclatura == "DEPARTAMENTO"
			|| nomenclatura == "DEPOSITO"
            || nomenclatura == "EDIFICIO"
			|| nomenclatura == "ETAPA"
            || nomenclatura == "FINCA"
            || nomenclatura == "HACIENDA"
			|| nomenclatura == "LOTE"
			|| nomenclatura == "MODULO"
            || nomenclatura == "MUNICIPIO"
            || nomenclatura == "PARCELA"
            || nomenclatura == "PARQUE INDUSTRIAL"
            || nomenclatura == "PASAJE"
			|| nomenclatura == "PREDIO"
            || nomenclatura == "PUENTE"
			|| nomenclatura == "PUESTO"
            || nomenclatura == "PASEO"
            || nomenclatura == "SALON"
            || nomenclatura == "SALON COMUNAL"
			|| nomenclatura == "SECTOR"
			|| nomenclatura == "SUITE"
			|| nomenclatura == "TERMINAL"
			|| nomenclatura == "TERRAZA"
            || nomenclatura == "TORRE"
            || nomenclatura == "UNIDAD"
            || nomenclatura == "UNIDAD RESIDENCIAL"
            || nomenclatura == "URBANIZACION"
            || nomenclatura == "VEREDA"
            || nomenclatura == "VIA"
            || nomenclatura == "VARIANTE"
			|| nomenclatura == "ZONA"
			|| nomenclatura == "ZONA FRANCA"
			|| nomenclatura == "ADELANTE"
			|| nomenclatura == "AL LADO"
            || nomenclatura == "ATRÁS"
            || nomenclatura == "AEREOPUERTO"
            || nomenclatura == "GLORIETA"
            || nomenclatura == "PARAJE"
            || nomenclatura == "INSPECCION DE POLICIA"
			|| nomenclatura == "INSPECCION DEPARTAMENTAL"
			|| nomenclatura == "INSPECCION MUNICIPAL")   {
	    salida += nomenclatura.toLowerCase();
		/* with  (document.getElementById('COMPLEMENTOS').style)
		         display="";
	       document.getElementById('nombreComplemento').value = salida;
		   document.getElementById('complementoActivo').value = '1';
		   document.getElementById('complemento').value = '';
		   document.getElementById('complemento').focus();
		*/
		muestraComplementoCalle(salida);
	}
	if (nomenclatura == "OTRA NOMENCLATURA") {
	     salida += "Digite " + nomenclatura.toLowerCase() + ":";
	     with  (document.getElementById('COMPLEMENTOS').style)
		         display="";
	       document.getElementById('nombreComplemento').value = salida;
		   document.getElementById('complementoActivo').value = '1';
		   document.getElementById('complemento').value = '';
		   document.getElementById('complemento').focus();
    }
	if (nomenclatura == "CALLE") {
	    muestraComplementoCalle('Calle');
    }
}

function validaComplemento() {
    var digitos =  new Array("0","1","2","3","4","5","6","7","8","9");
	var i,j;
	var numeros = false;
    if (document.getElementById('complemento').value.length == 0 || document.getElementById('complemento').value == "") {
	    document.getElementById('complemento').focus();
		return false;
	}
	else {
	    var campoStr = document.getElementById('complemento').value;
		for (i=campoStr.length-1;i>-1;i--) {
	        var ca = campoStr.charAt(i);
			 for(j=0;j<digitos.length;j++) {
		          if (ca == digitos[j]) numeros = true;
		     }
		}
	 }
	 if (numeros) {
	     alert("Esta campo no debe contener números, por favor verifique.");
		 document.getElementById('complemento').value = "";
	     document.getElementById('complemento').focus();
		 return false;
	 }
	 else {
	   ocultaComplemento();
	   return true;
	 }
   return true;
}

function decodificarDireccion(dEntrada,campoSalida) {
   var codigoNomenclaturas = new Array ("AD","AG","AGP","AK","AL","ALM","AP","APTDO","AUT",
             "AV","BG","BL","BLV","BRR","CA","CC","CD","CEL","CIR","CL","CN","CON","CONJ",
             "CR","CRR","CRT","CRV","CS","DG","DP","DPTO","DS","ED","EN","ESQ","ESTE","ET",
             "EX","FCA","GJ","GS","HC","IN","KM","LC","LM","LT","MCP","MD","MN","MZ","NORTE",
             "O","OCC","OESTE","OF","P","PA","PD","PH","PI","PJ","PL","PN","POR","PQ","PS",
             "PT","SA","SC","SEC","SL","SM","SS","ST","SU","SUR","TER","TO","TV","TZ","UN",
             "UR","URB","VDA","VTE","ZF","ZN","(OTRA)",
			 "ADL","ALD","ATR","CAS","CEN","CS","CRR","ESC","HG","IP","IPD","IPM","MJ","MLL",
			 "PRJ","PW","PAR","POS","RP","SA","SC","VIA");


   var nomenclaturas = new Array ("ADMINISTRACION","AGENCIA","AGRUPACION","AVENIDA CARRERA",
       "ALTILLO","ALMACEN","APARTAMENTO","APARTADO","AUTOPISTA","AVENIDA","BODEGA",
       "BLOQUE","BOULEVAR","BARRIO","CASA","CENTRO COMERCIAL","CIUDADELA","CELULA",
       "CIRCULAR","CALLE","CAMINO","CONJUNTO RESIDENCIAL","CONJUNTO","CARRERA",
       "CORREGIMIENTO","CARRETERA","CIRCUNVALAR","CONSULTORIO","DIAGONAL","DEPOSITO",
       "DEPARTAMENTO","DEPOSITO SOTANO","EDIFICIO","ENTRADA","ESQUINA","ESTE","ETAPA",
       "EXTERIOR","FINCA","GARAJE","GARAJE SOTANO","HACIENDA","INTERIOR","KILOMETRO",
       "LOCAL","LOCAL MEZZANINE","LOTE","MUNICIPIO","MODULO","MEZZANINE","MANZANA",
       "NORTE","ORIENTE","OCCIDENTE","OESTE","OFICINA","PISO","PARCELA","PREDIO","PENTHOUSE",
       "PARQUE INDUSTRIAL","PASAJE","PLANTA","PUENTE","PORTERIA","PARQUEADERO","PASEO",
       "PUESTO","SALON","SALON COMUNAL","SECTOR","SOLAR","SUPERMANZANA","SEMISOTANO",
       "SOTANO","SUITE","SUR","TERMINAL","TORRE","TRANSVERSAL","TERRAZA","UNIDAD",
       "UNIDAD RESIDENCIAL","URBANIZACION","VEREDA","VARIANTE","ZONA FRANCA","ZONA","",
	   "ADLANTE","AL LADO","ATRAS","CASERIO","CENTRO","COSULTORIO","CORREGIMIENTO","ESCALERA",
	   "HANGAR","INSPECCION DE POLICIA","INSPECCION DEPARTAMENTAL","INSPECCION MUNICIPAL",
	   "MOJON","MUELLE","PARAJE","PARK WAY","PARQUE","POSTE","ROUND POINT","SALON","SALON COMUNAL","VIA");
  var texto = dEntrada;
  var encontro = false;
  var codigo = "";
  var salida = "";
  var controlB = 0;
  var controlA = 0;
  for (k=0; k<texto.length;k++) {
      if (texto.substr(k,1) != " ") {
	      codigo += texto.substr(k,1);
      }
      else if (codigo.length > 0) {
          for(i=1;i < codigoNomenclaturas.length;i++) {
              if (codigo == codigoNomenclaturas[i]) {
                salida += " " + nomenclaturas[i];
                encontro = true;
             }
          }
          if(!encontro) {
             salida += " " + codigo;
          }
          codigo = "";
          encontro = false;
      }
      else {controlB++;
        if (controlB == 2 ) {
           if( controlA == 0) {
              controlA = 1;
              controlB = 0;
              salida += " #";
           } else salida += " -";
       }
     }
  }
  if (codigo.length > 0) {
     for(i=1;i < codigoNomenclaturas.length;i++) {
        if (codigo == codigoNomenclaturas[i]) {
           salida += " " + nomenclaturas[i];
           encontro = true;
        }
     }
     if(!encontro) {
             salida += " " + codigo;
     }
  }
  //alert("salida:::: " + campoSalida + " --:" + salida);
  document.getElementById(campoSalida).value= salida ;
  //document.getElementById(campoSalida).value = salida;
}

function borraCaracteresEspeciales(campo,texto) {
  var validos1  = new Array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "-", "*", " ");
  var validos2 =   new Array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m","n","ñ","o","p","q","r","s","t","u","v","w","x","y","z");
  var validos3 =   new Array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M","N","Ñ","O","P","Q","R","S","T","U","V","W","X","Y","Z");
  var invalidos1 =   new Array("ó", "ú", "í", "á", "é", "Á","É","Í","Ó","Ú","&");
  var remInvalidos1 =   new Array("o", "u", "i", "a", "e","A","E","I","O","U","\&");
  var digito = 0;
  var j = 0;
  var salida = "";
  for (i = 0; i < texto.length ; i++) {
     // salida+= texto.substr(i,1);
	  for (k=0; k<13;k++) {
	      if (texto.substr(i,1) == validos1[k])
		    salida += texto.substr(i,1);
	  }
	  for (k=0; k<30;k++) {
	      if (texto.substr(i,1) == validos2[k])
		    salida += texto.substr(i,1);
	  }
	  for (k=0; k<30;k++) {
	      if (texto.substr(i,1) == validos3[k])
		    salida += texto.substr(i,1);
	  }
	  for (k=0; k<11;k++) {
	      if (texto.substr(i,1) == invalidos1[k])
		    salida += remInvalidos1[k];
	  }
  }
  campo.value = salida;
 }

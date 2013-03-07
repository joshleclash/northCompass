/*
 * Ext JS Library 1.1.1
 * Copyright(c) 2006-2007, Ext JS, LLC.
 * licensing@extjs.com
 * 
 * http://www.extjs.com/license
 */

/*
 * Spanish/Latin American Translation by genius551v 04-08-2007
 * Revised by efege, 2007-04-15.
 */

Ext.UpdateManager.defaults.indicatorText = '<div class="loading-indicator">Cargando...</div>';

if(Ext.View){
   Ext.View.prototype.emptyText = "";
}

if(Ext.grid.Grid){
   Ext.grid.Grid.prototype.ddText = "{0} fila(s) seleccionada(s)";
}

if(Ext.TabPanelItem){
   Ext.TabPanelItem.prototype.closeText = "Cerrar esta pestaña";
}

if(Ext.form.Field){
   Ext.form.Field.prototype.invalidText = "El valor en este campo es invalido";
}

if(Ext.LoadMask){
    Ext.LoadMask.prototype.msg = "Cargando...";
}

Date.monthNames = [
   "Enero",
   "Febrero",
   "Marzo",
   "Abril",
   "Mayo",
   "Junio",
   "Julio",
   "Agosto",
   "Septiembre",
   "Octubre",
   "Noviembre",
   "Diciembre"
];

Date.dayNames = [
   "Domingo",
   "Lunes",
   "Martes",
   "Miercoles",
   "Jueves",
   "Viernes",
   "Sabado"
];

if(Ext.MessageBox){
   Ext.MessageBox.buttonText = {
      ok     : "Aceptar",
      cancel : "Cancelar",
      yes    : "Si",
      no     : "No"
   };
}

if(Ext.util.Format){
   Ext.util.Format.date = function(v, format){
      if(!v) return "";
      if(!(v instanceof Date)) v = new Date(Date.parse(v));
      //return v.dateFormat(format || "d/m/Y");
      return v.dateFormat(format || "m/d/Y");
   };
}

if(Ext.DatePicker){
   Ext.apply(Ext.DatePicker.prototype, {
      todayText         : "Hoy",
      minText           : "Esta fecha es anterior a la fecha minima",
      maxText           : "Esta fecha es posterior a la fecha maxima",
      disabledDaysText  : "",
      disabledDatesText : "",
      monthNames	: Date.monthNames,
      dayNames		: Date.dayNames,
      nextText          : 'Mes Siguiente (Control+Right)',
      prevText          : 'Mes Anterior (Control+Left)',
      monthYearText     : 'Seleccione un mes (Control+Up/Down para desplazar el año)',
      todayTip          : "{0} (Barra espaciadora)",
      format            : "m/d/Y"
      //format            : "d/m/Y"	  
   });
}

if(Ext.PagingToolbar){
   Ext.apply(Ext.PagingToolbar.prototype, {
      beforePageText : "Pagina",
      afterPageText  : "de {0}",
      firstText      : "Primera pagina",
      prevText       : "Pagina anterior",
      nextText       : "Pagina siguiente",
      lastText       : "Ultima pagina",
      refreshText    : "Actualizar",
      displayMsg     : "Mostrando {0} - {1} de {2}",
      emptyMsg       : 'Sin datos para mostrar'
   });
}

if(Ext.form.TextField){
   Ext.apply(Ext.form.TextField.prototype, {
      minLengthText : "El tamaño minimo para este campo es de {0}",
      maxLengthText : "El tamaño maximo para este campo es de {0}",
      blankText     : "Este campo es obligatorio",
      regexText     : "",
      emptyText     : null
   });
}

if(Ext.form.NumberField){
   Ext.apply(Ext.form.NumberField.prototype, {
      minText : "El valor mínimo para este campo es de {0}",
      maxText : "El valor máximo para este campo es de {0}",
      nanText : "{0} no es un número válido"
   });
}

if(Ext.form.DateField){
   Ext.apply(Ext.form.DateField.prototype, {
      disabledDaysText  : "Deshabilitado",
      disabledDatesText : "Deshabilitado",
      minText           : "La fecha para este campo debe ser posterior a {0}",
      maxText           : "La fecha para este campo debe ser anterior a {0}",
      invalidText       : "{0} no es una fecha válida - debe tener el formato {1}",
      format            : "m/d/Y"
	  //format            : "d/m/Y"
   });
}

if(Ext.form.ComboBox){
   Ext.apply(Ext.form.ComboBox.prototype, {
      loadingText       : "Cargando...",
      valueNotFoundText : undefined
   });
}

if(Ext.form.VTypes){
   Ext.apply(Ext.form.VTypes, {
      emailText    : 'Este campo debe ser una direccion de correo electronico con el formato "usuario@dominio.com"',
      urlText      : 'Este campo debe ser una URL con el formato "http:/'+'/www.dominio.com"',
      alphaText    : 'Este campo solo debe contener letras y _',
      alphanumText : 'Este campo solo debe contener letras, numeros y _'
   });
}

if(Ext.grid.GridView){
   Ext.apply(Ext.grid.GridView.prototype, {
      sortAscText  : "Ordenar en forma ascendente",
      sortDescText : "Ordenar en forma descendente",
      lockText     : "Bloquear Columna",
      unlockText   : "Desbloquear Columna",
      columnsText  : "Columnas"
   });
}

if(Ext.grid.PropertyColumnModel){
   Ext.apply(Ext.grid.PropertyColumnModel.prototype, {
      nameText   : "Nombre",
      valueText  : "Valor",
      dateFormat : "j/m/Y"
   });
}

if(Ext.SplitLayoutRegion){
   Ext.apply(Ext.SplitLayoutRegion.prototype, {
      splitTip            : "Arrastre para redimensionar.",
      collapsibleSplitTip : "Arrastre para redimensionar. Doble clic para ocultar."
   });
}
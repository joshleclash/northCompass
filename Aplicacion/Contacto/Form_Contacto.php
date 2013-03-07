<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css"/>

    <!-- GC -->
    <!-- LIBS -->
    <script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script>
    <!-- ENDLIBS -->

    <script type="text/javascript" src="../../ExtJS/ext-all.js"></script>

   <!-- <script type="text/javascript" src="../../Extjs/Examples/form/states.js"></script>-->
<!--    <script type="text/javascript" src="../../Extjs/Examples/form/dynamic.js"></script>-->
    <link rel="stylesheet" type="text/css" href="../../ExtJS/examples/form/forms.css"/>

    <!-- Common Styles for the examples -->
    <link rel="stylesheet" type="text/css" href="../../ExtJS/examples/shared/examples.css"/>
<!-- Libs forms  -->    
<title>North Compass</title>
<style type="text/css">
body,td,th {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #000;
}
</style>
</head>
<script language="javascript">

Ext.onReady(function(){

    Ext.QuickTips.init();
    Ext.form.Field.prototype.msgTarget = 'side';

    /*
     * ================  Simple form  =======================*/
	 
    var simple = new Ext.FormPanel({
        labelWidth: 75, // label settings here cascade unless overridden
        url:'Form_Contacto_SQL.php',
        frame:true,
        title: 'Datos de contacto',
        bodyStyle:'padding:5px 5px 0',
        width: 400,
        defaults: {width: 230},
        defaultType: 'textfield',
		labelAlign: 'top',
        items: [{
                fieldLabel: 'Nombre y Apellido',
                name: 'Nombres',
                allowBlank:false,
				anchor:'98%'
            },{
                fieldLabel: 'Número teléfonico',
                name: 'Telefono',
				allowBlank:false
            },{
                fieldLabel: 'Correo',
                name: 'email',
				allowBlank:false,
                vtype:'email'
            },{
				xtype:'htmleditor',
				id:'coment',
				allowBlank:false,
				fieldLabel:'Comentarios',
				height:100,
				anchor:'98%'
       		}	
		],
        buttons: [{
            text: 'Enviar',
			handler: function(){
				fn_Enviar();
				}
					
        },{
            text: 'Cancelar',
			handler:function(){
				simple.form.reset();
				}
        }]
    });

    simple.render('form');


    var DemoPanel = Ext.Panel({
        title: 'Area Comercial',
        frame: true,
        width: 200,
        height: 150,
        //html: 'Teléfono: 4109880<br>Correo: alejandra.vega@northcompass.com.co',
        bodyStyle: 'padding:10px 15px;'
    });
	
	DemoPanel.render('informacion');
function fn_Enviar(){
	simple.form.submit({
		reset : false,
		success:function()
			{
			Ext.Msg.alert('Confirmacion', 'Gracias por Contactar con Nosotros NORTHCOMPASS');
			simple.form.reset();
			},
			failure:function()
			{
				Ext.Msg.alert("Error", 'No se puede enviar el correo, por favor valide la información ingresada.');
			}
		});
	};
	
});
</script>
<body>
<table width="98%" border="0" cellspacing="3" cellpadding="2">
  <tr>
    <td width="56%"><div id="form"></div></td>
    <td width="44%">
    <p><b>Área Comercial</b><br>Teléfono: 4109880<br>Correo: <a href="mailto:alejandra.vega@northcompass.com.co">alejandra.vega@northcompass.com.co</a></p><br>
    <p><b>Área Operaciones</b><br />Teléfono: 4109880<br />Correo: <a href="mailto:carlos.alfonso@northcompass.com.co">carlos.alfonso@northcompass.com.co</a></p><br>
    <p><b>Área Administrativa</b><br>Teléfono: 4109880<br>Correo: <a href="mailto:alejandra.vega@northcompass.com.co">alejandra.vega@northcompass.com.co</a></p>
    </td>
  </tr>
</table>
</body>
</html>
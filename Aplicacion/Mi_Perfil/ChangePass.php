<?php
include("../../Conexion.php");
session_start();
$Csc=$_SESSION['Csc'];
	$sql="Select * from login where csc_login='".$Csc."'";
	db('northcompas',$link);
	$Query=mysql_query($sql);
	$Data=mysql_fetch_array($Query);
	$PassWord=$Data['PassWord'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- css styles-->
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/ext-all.css"/>
<link rel="stylesheet" type="text/css" href="../../ExtJS/resources/css/reset-min.css" />
<link rel="stylesheet" type="text/css" href="../../ExtJS/welcome.css"/>    

    <script type="text/javascript" src="../../ExtJS/adapter/ext/ext-base.js"></script> 
<!--    <script type="text/javascript" src="./Ext.ux.PasswordMeter.js"></script> -->
    <!-- ENDLIBS --> 
 	
    <script type="text/javascript" src="../../ExtJS/ext-all.js"></script>
<!-- Libs forms  -->    
<title>North Compass</title>
</head>
<script language="javascript">

Ext.onReady(function(){

    Ext.QuickTips.init();

    // turn on validation errors beside the field globally
    Ext.form.Field.prototype.msgTarget = 'side';

    /*
     * ================  Simple form  =======================*/
	 
    var simple = new Ext.FormPanel({
        labelWidth: 150, // label settings here cascade unless overridden
		url:'ChangePass_SQL.php?consulta=0',
		height:	260,
        frame:false,
		border: false,
        bodyStyle:'padding:5px 5px 0',
        width: 400,
        defaults: {width: 270},
        items: [{
		xtype : 'fieldset',
			labelAlign: 'top',
			defaults: {width: 200},
			height:	180,
			border: false,
			defaultType : 'textfield',
			invalidText : 'Reestablecer Contraseña.',
			items : [{
				xtype:	'hidden',
				name:	'UserCsc',
				id:		'UserCsc',
				value:	'<?php echo $Csc;?>'				
				},{
				xtype:	'hidden',
				id:		'dbpass',
				value:	'<?php echo $PassWord;?>'				
				},{
				inputType: 'password', 
				fieldLabel: 'Digité su contraseña actual',
                name: 'PassWordActual',
				id: 'PassWordActual',
                allowBlank:false
            },{
				inputType: 'password', 
                fieldLabel: 'Digité su nueva contraseña',
                name: 'PassWordNew',
				allowBlank:false,
				id: 'PassWordNew'
            },{
				inputType: 'password', 
                fieldLabel: 'Confirme su nueva contraseña',
                name: 'PassWordNew2',
				allowBlank:false,
				id: 'PassWordNew2'
			}]
        }],
        buttons: [{
            text: 'Guardar',
			handler: function(){
				var PassWordDb = document.getElementById('dbpass').value;
				var PasActual = document.getElementById('PassWordActual').value;
				var PassWordNew = document.getElementById('PassWordNew').value;
				var PassWordNew2 = document.getElementById('PassWordNew2').value;				
				if (PasActual=='' || PassWordNew==''){
					Ext.MessageBox.show({title:'Error', msg:'Ninguno de los campos puede estar vacio, revise su información', buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.QUESTION});
					}
				else if (PassWordDb!=PasActual){
					Ext.MessageBox.show({title:'Error', msg:'La contraseña que digito no coincide con la actual, revise su información', buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.QUESTION});
					}
				else if (PassWordNew!=PassWordNew2){
					Ext.MessageBox.show({title:'Error', msg:'La nueva contraseña y confirmación contraseña no coinciden, revise su información', buttons:Ext.MessageBox.OK, icon:Ext.MessageBox.QUESTION});
					}else {
						fn_enviar();
					}	
				}
        },{
            text: 'Borrar',
			handler: function(){
				simple.getForm().reset();
				}
        }]
});

var session='<?php echo  $Csc;?>';
	if (session==''){
		alert("Lo siento su session caduco");
		window.close();
}
simple.show();
simple.render('form');

function fn_enviar(){
	simple.getForm().submit({
		success: function(){
			Ext.Msg.alert('Confirmacion', 'Actualizacion de contraseña realizada correctamente.');
			simple.getForm().reset();			
		},
		failure: function(){
			Ext.Msg.alert('Confirmacion', 'Error en la actualizacion de contraseña valide su informacion.');
			simple.getForm().reset();			
		}	
	})
};

});
</script>
<body>
<div class="col" style=" width:98%">
<div class="block">
<h3 class="block-title">Cambio de Contraseña</h3>
        <div class="block-body">Sugerencias de la actualización de contraseña</div>
        <div class="block-body">          
          <ul class="list">
              <li>La longitud de la contraseña debe ser de mínimo 6 caracteres.</li>
              <li>La clave no debe ser igual al número de identificación o NIT<br />
              </li> 
          </ul>
        </div>  
</div>
<div class="block">
<table width="90%">
<tr>
  <td>
    <table width="90%">
      <tr>
        <td width="14%" align="center"><img src="Lock.jpg" width="127" height="91" align="top"/></td>
        <td width="86%"><div id="form"></div></td>
        </tr>
      </table>
    </td>
</tr>
</table>
</div>
</div>
</body>
</html>
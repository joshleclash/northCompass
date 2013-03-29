<?php
include("../../Conexion.php");
@session_start();
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
        labelWidth: 75, // label settings here cascade unless overridden
        url:'save-form.php',
        frame:true,
        title: 'Simple Form',
        bodyStyle:'padding:5px 5px 0',
        width: 350,
        defaults: {width: 230},
        defaultType: 'textfield',

        items: [{
                fieldLabel: 'First Name',
                name: 'first',
                allowBlank:false
            },{
                fieldLabel: 'Last Name',
                name: 'last'
            },{
                fieldLabel: 'Company',
                name: 'company'
            }, {
                fieldLabel: 'Email',
                name: 'email',
                vtype:'email'
            }, new Ext.form.TimeField({
                fieldLabel: 'Time',
                name: 'time',
                minValue: '8:00am',
                maxValue: '6:00pm'
            })
        ],

        buttons: [{
            text: 'Save'
        },{
            text: 'Cancel'
        }]
    });

    simple.render('form');

var session='<?php echo  $Csc;?>';
	if (session==''){
		alert("Lo siento su session caduco");
		window.close();
}
simple.show();

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
    <table width="98%" border="0" cellspacing="3" cellpadding="2">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><div id="form"></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>